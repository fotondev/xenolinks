<?php

namespace App\Http\Controllers;

use App\Models\Duel;
use App\Models\Event;
use App\Services\Event\UpdateScore;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DuelController extends Controller
{
    public function show(Event $event, Duel $duel)
    {
        return view('duels.show', [
            'duel' => $duel
        ]);
    }

    public function edit(Event $event, Duel $duel)
    {
        return view('duels.edit', [
            'event' => $event,
            'duel' => $duel
        ]);
    }

    public function update(Request $request, Event $event, Duel $duel, UpdateScore $service)
    {     
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
        return redirect()->route('duels', $event->id);
    }
}
