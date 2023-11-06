<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function appointments(){
        return $this->morphMany(Appointable::class,'appointable');
    }

}

