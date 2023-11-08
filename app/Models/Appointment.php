<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function appointments():MorphMany
    {
        return $this->morphMany(Appointable::class,'appointable');
    }

}
