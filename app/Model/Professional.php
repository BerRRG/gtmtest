<?php

namespace App\Model;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'professional_id', 'id');
    }

}