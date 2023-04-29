<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class SettingsPage extends Component
{
    public Event $event;
    
    public function render()
    {
        return view('livewire.settings-page');
    }
}
