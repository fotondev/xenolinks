<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Models\Duel;

use App\Services\BaseService;

class UpdateScore extends BaseService
{
    public function rules()
    {
        return [
           'p1_score' => 'numeric',
           'p2_score' => 'numeric'
        ];
    }

    public function execute(array $data)
    {
        $this->validate($data);
        $duel = Duel::findOrFail($data['id']);
    
        $duel->update($data);
    }
}
