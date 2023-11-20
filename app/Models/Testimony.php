<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quote',
        'name',
        'position',
        'company'
    ];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
