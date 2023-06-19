<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Enums\EventStatus;
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
        if ($event->status != EventStatus::Launched && $event->status != EventStatus::Finished) {
            if ($event->checkedParticipants->count() == $event->size) {
                $event->status = EventStatus::Pending;
                $event->save();
            } else {
                $event->status = EventStatus::Setup;
                $event->save();
            }
        }
    }
}
