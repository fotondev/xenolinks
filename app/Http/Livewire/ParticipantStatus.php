<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ParticipantStatus extends Component
{

    public $participant;
    public $isChecked;
    public $field;


    public function mount()
    {

        $this->isChecked = (bool) $this->participant->getAttribute($this->field);
    }

    public function updating($field, $value): void
    {
        $this->participant->setAttribute($this->field, $value)->save();
        $this->emit('statusChanged');
    }



    public function render()
    {
        return view('livewire.participant-status');
    }
}
