<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SettingsPage extends Component
{
    use AuthorizesRequests;

    public Event $event;


    public function deleteEvent()
    {
        $this->authorize('event-update', $this->event);
        $this->event->delete();


        Session::flash('message', 'Событие удалено');
        return redirect()->to(route('events.index'));
    }

    public function render()
    {
        return view('livewire.settings-page');
    }
}
