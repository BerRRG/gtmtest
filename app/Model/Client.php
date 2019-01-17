<?php

namespace App\Model;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class, 'client_id', 'id');
    }
}