<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\Event;
use App\Services\BaseService;

class UpdateGeneralInfo extends BaseService
{
    public function rules()
    {
        return  [
            'title' => 'required|min:3|max:32',
            'location' => 'required',
            'size' => [
                'required', 'numeric', 'min:2', 'max:128',
                function ($attribute, $value, $fail) {
                    if ($value % 2 != 0) {
                        $fail('Размер турнира должен быть кратен 2');
                    }
                }
            ],
            'level' => 'required',

            'description' => 'max:1024',
            'start_date' => 'nullable|after:now',
            'end_date' => 'nullable|after:start_date'
        ];
    }

    public function execute(array $data): void
    {
        $this->validate($data);

        $event = Event::findOrFail($data['id']);

        $event->update($data);
    }

    public function changeStatus($event): void
    {
        if ($event->status->value != 'launched') {
            if ($event->checkedParticipants->count() == $event->size) {
                $event->status = 'pending';
                $event->save();
            } else {
                $event->status = 'setup';
                $event->save();
            }
        }
    }
}
