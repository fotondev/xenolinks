<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\Event;
use App\Services\BaseService;

class CreateEvent extends BaseService
{
    public function rules()
    {
        return  [
            'title' => 'required|min:3|max:32',
            'location' => 'required',
            'size' => 'required|numeric|min:2|max:128',
            'level' => 'required',
        ];
    }

    public function execute(array $data)
    {
        $this->validate($data);

        return Event::create($data);
    }


    // public function checkConflict(): void
    // {
    //     $conflict = 
    // }
}
