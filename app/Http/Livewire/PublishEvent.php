<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Services\Event\UpdatePublishInfo;
use Livewire\Component;

class PublishEvent extends Component
{

    public Event $event;
    public $startDate;
    public $endDate;

    public function publish(UpdatePublishInfo $service)
    {

        $service->execute([
            'id' => $this->event->id,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'visible' => '1'
        ]);

        return redirect()->to(route('event.show', $this->event->id));
    }
    public function render()
    {
        return view('livewire.publish-event');
    }
}
