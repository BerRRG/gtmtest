<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }

    public function professionals()
    {
        return $this->belongsToMany(Professional::class);
    }
}