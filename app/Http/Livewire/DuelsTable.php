<?php

namespace App\Http\Livewire;

use App\Models\Duel;
use App\Models\Event;
use App\Models\Round;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class DuelsTable extends Component
{

    public $event;

    public $currentRound;

    public $currentMatches;

    public function mount($event)
    {

        $currentRound =  $this->currentRound = Round::where('event_id', $event)->orderBy('number', 'desc')->first();


        if ($currentRound) {
            $this->currentMatches = $currentRound->duels()->get();
        } else {
            $this->currentMatches =  collect();
        }

        $this->event = Event::findOrFail($event);
    }


    public function render()
    {
        return view('livewire.duels-table', [
            'event' => $this->event,
            'currentRound' => $this->currentRound,
            'currentMatches' => $this->currentMatches,
        ]);
    }

    public function createNextRound()
    {
        $participants = $this->event->participants->sortBy('current_score')->values();

        $matchesPerRound = $participants->count() / 2;

        $roundNumber = $this->event->rounds()->count() + 1;

        $round = Round::create([
            'event_id' => $this->event->id,
            'number' => $roundNumber,
        ]);



        $this->currentMatches = collect();
        for ($i = 0; $i < $matchesPerRound; $i++) {
            $participant1 = $participants[$i];
            $participant2 = $participants[$participants->count() - 1 - $i];

            $duel = Duel::create([
                'round_id' => $round->id,
                'number' => $i + 1
            ]);

            $duel->addOpponent($participant1->id);
            $duel->addOpponent($participant2->id);

            $this->currentMatches->push($duel);
        }
        $this->currentRound = $round;


        $this->event->refresh();
    }


    public function checkDuelsScore($matches)
    {
        foreach ($matches as $match) {
            if (empty($match['p1_score']) || empty($match['p2_score'])) {
                return false;
            }
        }
        return true;
    }



    public function finishRound()
    {
        if ($this->checkDuelsScore($this->currentMatches)) {
            foreach ($this->currentMatches as $match) {
                $this->currentRound->is_finished = 1;
                $this->currentRound->save();
                foreach ($match->participants as $key => $participant) {
                    if ($key == 0) {
                        $participant->current_score += $match->p1_score;
                        $participant->save();
                    } else {
                        $participant->current_score += $match->p2_score;
                        $participant->save();
                    }
                }
            }
        } else {
            Session::flash('message', 'Все дуэли должны иметь счет!');
        }
    }



    public function showPreviousRound()
    {
       $roundNumber = $this->currentRound['number'] - 1;
       
    }
}
