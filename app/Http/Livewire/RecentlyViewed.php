<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RecentlyViewed extends Component
{
    public $events;

    public function mount()
    {
        $this->events = collect();
    }

    public function loadRecentlyViewed()
    {

        $sessionId = session()->getId();
        $sessionData = DB::table('sessions')->where('id', $sessionId)->first();
        $payload = unserialize(base64_decode($sessionData->payload));
        dd($payload);
        $recentlyViewed = $payload['recently_viewed'];
    
        $this->events = Event::whereIn('id', $recentlyViewed)
            ->orderByDesc('created_at')
            ->select('id', 'title', 'start_date', 'logo', 'status')
            ->get();
    }


    public function render()
    {
        return view('livewire.recently-viewed')
            ->with('events', $this->events);
    }
}
