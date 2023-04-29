<?php

namespace App\Models;

use App\Enums\RegistrationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ParticipantRegistration extends Model
{
    use HasFactory;

    protected $fillable = [      
        'status',
        'participant_id',
        'event_id',
    ];
    
    protected $casts = [
        'status' => RegistrationStatus::class
    ];


    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }

    public function event(): BelongsTo
    {
       return $this->belongsTo(Event::class);
    }

   
}

