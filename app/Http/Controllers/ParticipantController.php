<?php

namespace App\Http\Controllers;

use App\Models\Duel;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Services\Event\CreateParticipant;
use App\Services\Event\UpdateParticipant;
use App\Services\Event\UpdateParticipantScore;
use Illuminate\Validation\ValidationException;

class ParticipantController extends Controller
{

    public function index(Event $event)
    {
        $participants = Participant::where('event_id', $event->id)->get();
        $checked = Participant::where('event_id', $event->id)->where('is_checked', true)->get();
        return view('participants.index', [
            'event' => $event,
            'participants' => $participants,
            'checked' => $checked
        ]);
    }

    public function create(Event $event)
    {
        return view('participants.create', [
            'event' => $event
        ]);
    }

    public function store(Request $request, Event $event, CreateParticipant $service)
    {
        try {
            $participant = $service->execute([
                'name' => $request->name,
                'email' => $request->email,
                'user_id' => $request->user_id,
                'event_id' => $event->id,
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }
        session()->flash('message', 'Участник добавлен');
        return redirect()->route('participants.index', $event->id);
    }


    public function edit(Event $event, Participant $participant)
    {
        return view('participants.edit', [
            'event' => $event,
            'participant' => $participant
        ]);
    }

    public function update(
        Request $request,
        Event $event,
        Participant $participant,
        UpdateParticipant $service
    ) {
        try {
            $service->execute([
                'id' => $participant->id,
                'name' => $request->name,
                'email' => $request->email,
                'user_id' => $request->user_id,
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }
        session()->flash('message', 'Участник обновлен');
        return redirect()->route('participants.index', $event->id);
    }


   


    public function delete(Event $event, Participant $participant)
    {
        $participant->delete();
        return to_route('participants.index', $event->id);
    }
}
