<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sun extends Model
{
    public function solar()
    {
        return $this->belongsTo('App\Models\Solar');
    }
}
