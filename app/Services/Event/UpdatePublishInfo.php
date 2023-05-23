<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\Event;
use App\Services\BaseService;

class UpdatePublishInfo extends BaseService
{
    public function rules()
    {
        return  [
            'id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|',
        ];
    }


    public function execute(array $data): void
    {
        $this->validate($data);
        dd($data);
        $event = Event::findOrFail($data['id']);
        $event->update($data);
    }
}
