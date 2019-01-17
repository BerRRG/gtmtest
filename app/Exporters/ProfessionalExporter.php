<?php

namespace App\Exporters;

use App\Model\Professional;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ProfessionalExporter implements FromQuery, WithHeadings
{
    public function headings(): array
    {
        return [
            'numero de tratamentos',
            'nome',
        ];
    }

    public function query()
    {
        return Professional::query()
            ->join('calendars', 'professionals.id', 'calendars.professional_id')
            ->select(
            DB::raw('count(professionals.name) as countabc'),
            'professionals.name'
            )->groupBy('professional_id');
    }
}
