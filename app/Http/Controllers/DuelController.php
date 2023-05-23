<?php

namespace App\Http\Controllers;

use App\Models\Duel;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Services\Event\UpdateScore;
use Illuminate\Support\Facades\Gate;
use App\Services\Event\UpdateGeneralInfo;
use Illuminate\Validation\ValidationException;

class DuelController extends Controller
{
    public function index(Event $event, UpdateGeneralInfo $service)
    {
        $duels = Duel::where('event_id', $event->id)->get();
        $service->changeStatus($event);
        return view('duels.index', [
            'event' => $event,
            'duels' => $duels
        ]);
    }

    public function show(Event $event, Duel $duel)
    {
        return view('duels.show', [
            'duel' => $duel
        ]);
    }

    public function edit(Event $event, Duel $duel)
    {

        if (!Gate::allows('event-update', $event)) {
            abort(403);
        }
        return view('duels.edit', [
            'event' => $event,
            'duel' => $duel
        ]);
    }

    public function update(Request $request, Event $event, Duel $duel, UpdateScore $service)
    {

        if (!Gate::allows('event-update', $event)) {
            abort(403);
        }
        try {
            $service->execute([
                'id' => $duel->id,
                'p1_score' => $request->p1_score,
                'p2_score' => $request->p2_score
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }

        session()->flash('message', 'Сражение обновлено');
        return redirect()->route('duels.index', $event->id);
    }
}
