<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Logo;
use App\Services\Event\UpdateLogoService;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateLogo extends Component
{
    use WithFileUploads;

    public Event $event;
    public $logo;

    protected $rules = [
        'logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
    ];

    public function uploadLogo(): void
    {
        $this->validate();

        $logoToShow = $this->event->logo ?? null;

        $this->event->update([
            'logo' => $this->logo ? $this->logo->store('logos', 'public') : $logoToShow,
        ]);
        session()->flash('success', 'Логотип обновлен');
    }


    public function deleteLogo()
    {

        $this->event->update([
            'logo' => ''
        ]);
        session()->flash('success', 'Логотип удален');
    }

    public function render()
    {
        return view('livewire.update-logo');
    }
}
