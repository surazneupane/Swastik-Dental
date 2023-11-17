<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'position',
        'about',
        'twitter',
        'facebook',
        'instagram'
    ];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
