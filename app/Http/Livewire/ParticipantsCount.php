<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\Participant;

class ParticipantsCount extends Component
{
    public Event $event;
    public $checked=[];

    public $listeners = [
        'statusChanged' => 'changeCount',
        'participantDelete' => 'changeCount'
    ];

    public function changeCount(): void
    {
        $this->checked = Participant::where('event_id', $this->event->id)
            ->where('is_checked', true)
            ->get();
    }

    public function render()
    {
        return view('livewire.participants-count', [
            'event' => $this->event,
            'checked' => $this->checked
        ]);
    }
}
