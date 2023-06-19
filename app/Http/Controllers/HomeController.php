<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController
{
    public function __invoke()
    {

        $events = Cache::remember('events', 15, function () {
            return Event::visible()
                ->orderBy('created_at')
                ->with('owner:id,name')
                ->withCount('checkedParticipants')
                ->get();
        });

        return view('home', [
            'events' => $events
        ]);
    }
}
