<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }
}