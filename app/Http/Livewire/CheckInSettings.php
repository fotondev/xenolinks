<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Services\Event\UpdateCheckInSettings;

class CheckInSettings extends Component
{

    public Event $event;
    public $checkInOpen;
    public $checkInClose;


    public function setCheckIn(UpdateCheckInSettings $service)
    {
        $service->execute([
            'event_id' => $this->event->id,
            'open_check-in_date' => $this->openCheckIn,
            'close_check-in_date' => $this->closeCheckIn,
        ]);
    }
    public function render()
    {
        return view('livewire.check-in-settings');
    }
}
