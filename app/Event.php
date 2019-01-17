<?php

namespace App;

use App\Model\Professional;
use App\Model\Client;
use App\Model\Clinic;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function professional()
    {
        return $this->belongsTo(Professional::class, 'professional_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
