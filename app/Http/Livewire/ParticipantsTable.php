<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;

class ParticipantsTable extends Component
{
    use WithPagination;

    public Event $event;
    public Participant $participant;

    public $search = '';
    public $status = 'all';
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'status', 'sortAsc'];



    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function delete(int $id)
    {
        Participant::find($id)->delete();
        $this->emit('participantDelete');
    }


    public function render()
    {
        return view('livewire.participants-table',  [
            'participants' => Participant::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })->when($this->status !== 'all', function ($query) {
                $query->where('is_checked', $this->status);
            })->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
                ->where('event_id', $this->event->id)
                ->paginate(5)
        ]);
    }
}
