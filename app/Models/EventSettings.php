<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'open_reg_date',
        'close_reg_date',
        'enable_reg', 
        'open_check-in_date',
        'close_check-in_date'
    ];


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

}
