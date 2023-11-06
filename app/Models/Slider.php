<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
        'id',
        'status'
    ];
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function text(){
        return $this->morphOne(Text::class,'textable');
    }
}
