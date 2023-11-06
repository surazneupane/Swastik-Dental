<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

//This model is currently used to save the text description of image
class Text extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'heading',
        'description',
        'textable_id',
        'textable_type'
        ];



    public function textable():MorphTo
    {
        return $this->morphTo();
    }
}
