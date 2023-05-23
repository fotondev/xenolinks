<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Services\Event\UpdatePublishInfo;
use Livewire\Component;

class PublishEvent extends Component
{

    public Event $event;

    public function publish()
    {

        $this->event->visible = 1;
        $this->event->save();

        return redirect()->to(route('event.show', $this->event->id));
    }

    public function render()
    {
        return view('livewire.publish-event', [
            'event' => $this->event
        ]);
    }
}
