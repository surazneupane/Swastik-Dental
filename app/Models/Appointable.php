<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Appointable extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'appointable_id',
        'appointable_type'
    ];

    public function appointable():MorphTo
    {
        return $this->morphTo();
    }

}
