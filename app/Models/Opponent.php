<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\PartParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opponent extends Model
{
    use HasFactory;


    public function participant(): BelongsTo
    {
        return $this->participant(Participant::class);
    }

    public function duel(): BelongsTo       
    {
        return $this->belongsTo(Duel::class);
    }
}
