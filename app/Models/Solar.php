<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solar extends Model
{
    public function sun()
    {
        return $this->hasOne('App\Models\Sun');
    }

    public function planets()
    {
        return $this->hasMany('App\Models\Planet');
    }
}
