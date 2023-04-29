<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\Event;
use App\Models\Participant;
use App\Services\BaseService;

class CreateParticipant extends BaseService
{
    public function rules()
    {
        return [
            'name' => 'required|max:32',
            'email' => 'email',
        ];
    }

    public function execute(array $data)
    {
        $this->validate($data);

        Participant::create($data);

        session()->flash('message', 'Участник добавлен');
    }

}
