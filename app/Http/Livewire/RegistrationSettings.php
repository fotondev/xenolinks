<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Services\Event\UpdateRegistrationSettings;
use Livewire\Component;

class RegistrationSettings extends Component
{
    public Event $event;
    public $openReg;
    public $closeReg;
    public $enableReg;


    public function setRegistration(UpdateRegistrationSettings $service)
    {
        $service->execute([
            'event_id' => $this->event->id,
            'open_reg_date' => $this->openReg,
            'close_reg_date' => $this->closeReg,
            'enable_reg' => $this->enableReg,
        ]);
    }

    public function render()
    {
        return view('livewire.registration-settings');
    }
}
