<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class UnpublishEvent extends Component
{
    public Event $event;

    public function unpublish()
    {
        $this->event->visible = '0';
        $this->event->save();

        Session::flash('message', 'Событие невидимо');
        return redirect()->to(route('event.show', $this->event->id));
    }

    public function render()
    {
        return view('livewire.unpublish-event');
    }
}
