<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Services\Event\UpdateRegistrationSettings;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class EventRegistrationSettings extends Component
{
    public Event $event;
    public $deadline;
    public $fee;


    public function saveSettings(UpdateRegistrationSettings $service)
    {
        $service->execute([
            'event_id' => $this->event->id,
            'registration_deadline' => $this->deadline,
            'registration_fee' => $this->fee,
        ]);

        dd($this->deadline);

        Session::flash('message', 'Регистрация обновлена');
    }

    public function enableRegistration()
    {
        $this->event->update([
            'registration_enabled' => !$this->event->registration_enabled,
        ]);
    }

    public function render()
    {
        return view('livewire.registration-form');
    }
}
