<?php

namespace App\Http\Livewire;

use App\Models\Duel;
use App\Models\Event;
use App\Models\Round;
use Livewire\Component;
use App\Enums\EventStatus;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DuelsTable extends Component
{

    use AuthorizesRequests;

    public Event $event;

    public ?Round $currentRound;

    public $currentMatches;

    public $roundsAmount;

    public $participants;

    public function mount()
    {
      
        $this->currentRound = $this->event->rounds()->latest()->first();
   

        $this->currentMatches = $this->currentRound
            ? $this->currentRound->duels()->get()
            : collect();



        $this->participants = $this->event->participants
            ->sortByDesc('current_score');

        $this->roundsAmount = ceil(log($this->participants->count()) / log(2));
    }


    public function render()
    {
        return view('livewire.duels-table')
            ->with('event', $this->event)
            ->with('currentRound', $this->currentRound)
            ->with('currentMatches', $this->currentMatches)
            ->with('roundsAmount', $this->roundsAmount)
            ->with('participants', $this->participants);
    }

    public function createNextRound()
    {
        $this->authorize('event-update', $this->event);
       
        if ($this->event->status !== EventStatus::Launched) {
            $this->event->status = EventStatus::Launched;
            $this->event->save();
           
        }
    
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
                'event_id' => $this->event->id,
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


    public function finishRound()
    {
        $this->authorize('event-update', $this->event);

        if (!$this->checkDuelsScore($this->currentMatches)) {
            Session::flash('message', 'Все дуэли должны иметь счет!');
            return;
        }

        $this->currentMatches->each(function ($match) {
            $match->participants->each(function ($participant, $key) use ($match) {
                $participant->current_score += $key === 0
                    ? $match->p1_score
                    : $match->p2_score;
                $participant->save();
            });
        });

        $this->currentRound->is_finished = 1;
        $this->currentRound->save();
    }

    public function finishEvent()
    {
        $this->authorize('event-update', $this->event);

        $this->currentMatches->each(function ($match) {
            $match->participants->each(function ($participant, $key) use ($match) {
                $participant->current_score += $key === 0
                    ? $match->p1_score
                    : $match->p2_score;
                $participant->save();
            });
        });

        $this->currentRound->is_finished = 1;
        $this->currentRound->save();

        $this->event->status = EventStatus::Finished;
        $this->event->end_date = now();
        $this->event->save();
    }

    public function showPreviousRound()
    {
        $roundNumber = $this->currentRound->number - 1;
        $this->currentRound = $this->event->rounds()->where('number', $roundNumber)->first();
        $this->currentMatches = $this->currentRound->duels()->get();
    }


    public function showNextRound()
    {
        $roundNumber = $this->currentRound->number + 1;
        $this->currentRound = $this->event->rounds()->where('number', $roundNumber)->first();
        $this->currentMatches = $this->currentRound->duels()->get();
    }

    private function checkDuelsScore($matches)
    {
        return $matches->every(function ($match) {
            return !empty($match['p1_score']) && !empty($match['p2_score']);
        });
    }
}
