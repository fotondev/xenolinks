<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\Event;
use App\Services\BaseService;
use Illuminate\Support\Facades\Storage;

class UpdateGeneralInfo extends BaseService
{
    public function rules()
    {
        return  [
            'title' => 'required|min:3|max:32',
            'location' => 'required',
            'size' => 'required|numeric|min:2|max:128',
            'level' => 'required',
            // 'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024|dimensions:max_width=256,max_height=256',
            'description' => 'max:1024',
            'start_date' => 'nullable|after:now',
            'end_date' => 'nullable|after:start_date'
        ];
    }

    public function execute(array $data)
    {
        $this->validate($data);

        
        $event = Event::findOrFail($data['id']);

        $event->update($data);
    }


}
