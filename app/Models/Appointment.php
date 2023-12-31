<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone_no',
        'email',
        'time',
        'date',
        'service'
    ];

}
