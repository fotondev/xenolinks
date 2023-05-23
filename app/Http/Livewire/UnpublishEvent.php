<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class UnpublishEvent extends Component
{
    public Event $event;

    public function unpublish()
    {
        $this->event->visible = '0';
        $this->event->save();

        return redirect()->to(route('event.show', $this->event->id));
    }

    public function render()
    {
        return view('livewire.unpublish-event');
    }
}
