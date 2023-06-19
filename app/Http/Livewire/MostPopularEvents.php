<?php

namespace App\Http\Livewire;

use App\Enums\EventStatus;
use App\Models\Event;
use Livewire\Component;

class MostPopularEvents extends Component
{
    public $events;

    public function mount()
    {
        $this->events = collect();
    }

    public function loadMostPopular()
    {
        $this->events = Event::where('status', !EventStatus::Finished)
            ->select('id', 'title', 'start_date', 'logo', 'status')
            ->withCount('participants')
            ->orderByDesc('participants_count')
            ->orderByDesc('created_at')
            ->limit(5)

            ->get();
    }


    public function render()
    {
        return view('livewire.most-popular-events')
            ->with('events', $this->events);
    }
}
