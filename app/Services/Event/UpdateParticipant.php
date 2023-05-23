<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\Participant;
use App\Services\BaseService;

class UpdateParticipant extends BaseService
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

        $participant = Participant::findOrFail($data['id']);

        $participant->update($data);
    }
}
