<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Http\Livewire\CheckInSettings;
use App\Services\BaseService;

class UpdateCheckInSettings extends BaseService
{
    public function rules()
    {
        return  [
            'event_id' => 'required',
            'check-in_open_date' => 'required',
            'check-in_close_date' => 'required',
        ];
    }

    public function execute(array $data): void
    {
        $this->validate($data);
        $settings = CheckInSettings::where('event_id', $data['event_id']);
        $settings->update($data);
    }
}
