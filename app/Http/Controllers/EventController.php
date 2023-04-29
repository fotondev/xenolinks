<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Services\Event\CreateEvent;
use App\Services\Event\UpdateGeneralInfo;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('created_at')->with('owner:id,name')->get();
        return view('events.index', [
            'events' => $events
        ]);
    }

    public function show(Event $event)
    {
        $checked = Participant::where('event_id', $event->id)
            ->where('is_checked', true)
            ->get();
            
        return view('events.show', [
            'event' => $event,
            'checked' => $checked
        ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request, CreateEvent $service)
    {
        try {
            $event = $service->execute([
                'title' => $request->title,
                'location' => $request->location,
                'size' => $request->size,
                'level' => $request->level,
                'description' => $request->description,
                'owner_id' => auth()->user()->id
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }


        session()->flash('message', 'Событие создано');
        return redirect()->route('event.show', $event->id);
    }

    public function edit(Event $event)
    {
        return view('events.edit', [
            'event' => $event
        ]);
    }

    public function update(Request $request, Event $event, UpdateGeneralInfo $service)
    {

        try {
            $service->execute([
                'id' => $event->id,
                'title' => $request->title,
                'location' => $request->location,
                'size' => $request->size,
                'level' => $request->level,
                'description' => $request->description,
                'start_date' => $request->startDate,
                'end_date' => $request->endDate,
                'owner_id' => auth()->user()->id
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }
        session()->flash('message', 'Событие обновлено');
        return redirect()->route('event.show', $event->id);
    }

    public function delete(Event $event)
    {
        $event->delete();
        return to_route('events.index');
    }
}
