<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Duel extends Model
{
    use HasFactory;

    protected $fillable = [
        'round_id',
        'number',
        'p1_score',
        'p2_score'
    ];


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class, 'duel_participant');
    }

    public function round(): BelongsTo
    {
        return $this->belongsTo(Round::class);
    }


    public function addOpponent(int $participantId)
    {
        $this->participants()->attach($participantId);
    }
}
