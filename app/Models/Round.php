<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'number'
    ];


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function duels(): HasMany
    {
        return $this->hasMany(Duel::class);
    }

}