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
            'openReg' => 'required',
            'closeReg' => 'required',
            'enableReg' => 'required'
        ];
    }

    public function execute(array $data): void
    {
        $this->validate($data);
        $settings = EventSettings::where('event_id', $data['event_id']);
        $settings->update($data);
    }
}
