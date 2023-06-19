<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\EventSettings;
use App\Services\BaseService;

class UpdateRegistrationSettings extends BaseService
{
    public function rules()
    {
        return  [
            'event_id' => 'required',
            'registration_deadline' => 'nullable|after:now',
            'registration_fee' => 'nullable|numeric'
        ];
    }

    public function execute(array $data): void
    {
        $this->validate($data);
        $settings = EventSettings::where('event_id', $data['event_id']);
        $settings->update($data);
    }
}
