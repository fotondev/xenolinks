<?php

namespace App\Http\Livewire;

use App\Models\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class UploadLogo extends Component
{
    use WithFileUploads;

    public Event $event;
    public $logo;
    public $logoPreview;

   

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024|dimensions:max_width=1024,max_height=1024',
        ]);
        $this->previewLogo();
    }

    public function previewLogo()
    {
        if ($this->logo) {
          
            $this->logoPreview = $this->logo->temporaryUrl();
        }
    }

    public function uploadLogo(): void
    {

        $filename = $this->logo->store('/', 'logos');


        $this->event->update([
            'logo' => $filename
        ]);


        Session::flash('message', 'Логотип обновлен');
    }

    public function deleteLogo()
    {

        $this->event->update([
            'logo' => ''
        ]);
        Session::flash('message', 'Логотип удален');
    }

    public function render()
    {
        return view('livewire.upload-logo');
    }
}
