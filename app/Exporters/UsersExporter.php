<?php

namespace App\Exporters;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExporter implements FromCollection
{
    public function collection()
    {
        return User::all();
    }
}
