<?php

namespace App\Models;

use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'size',
        'description',
        'level',
        'logo',
        'start_date',
        'end_date',
        'enable_reg',
        'owner_id',
        'visible',
        'status'
    ];
    protected $guarded = [];

    protected $casts = [
        'status' => EventStatus::class
    ];

    public function path()
    {
        return "/events/{$this->id}";
    }

    /**
     * Scope a query to only include visible games.
     */
    public function scopeVisible(Builder $query): void
    {
        $query->where('visible', 1);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function checkedParticipants(): HasMany
    {
        return $this->hasMany(Participant::class)->where('is_checked', 1);
    }


    public function rounds(): HasMany
    {
        return $this->hasMany(Round::class);
    }
}
