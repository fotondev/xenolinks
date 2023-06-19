<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Services\Event\UpdatePublishInfo;

class PublishEvent extends Component
{

    public Event $event;

    public function publish()
    {

        $this->event->visible = 1;
        $this->event->save();


        Session::flash('message', 'Событие опубликовано');
        return redirect()->to(route('event.show',$this->event->id));
      
    }

    public function render()
    {
        return view('livewire.publish-event', [
            'event' => $this->event
        ]);
    }
}
