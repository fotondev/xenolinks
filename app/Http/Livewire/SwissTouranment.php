<?php

namespace App\Http\Livewire;

use App\Models\Duel;
use App\Models\Round;
use Livewire\Component;

class SwissTouranment extends Component
{
    public $rounds;

    public function mount()
    {
        $this->rounds = collect(); // initialize an empty collection of rounds
    }

    // public function createRound()
    // {
    //     $round = new Round();

    //     // distribute participants according to Swiss system
    //     // logic to distribute should be implemented here

    //     // save the round and its duels
    //     $round->save();

    //     foreach ($participants as $participant) {
    //         $duel = new Duel();
    //         $duel->participant1_id = $participant->id;

    //         // logic to find opponent should be implemented here
    //         $opponent = Participant::find($participant->id + 1) ?? Participant::find($participant->id - 1);
    //         $duel->participant2_id = $opponent->id;

    //         $duel->round_id = $round->id;
    //         $duel->save();
    //     }

    //     // add the round to the collection of rounds
    //     $this->rounds[] = $round;
    // }

    // public function render()
    // {
    //     return view('livewire.swiss-tournament');
    // }
}
