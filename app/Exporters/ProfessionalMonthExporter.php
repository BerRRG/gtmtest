<?php

namespace App\Exporters;

use Carbon\Carbon;
use App\Model\Professional;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ProfessionalMonthExporter implements FromQuery, WithHeadings
{
    public function headings(): array
    {
        return [
            'numero de tratamentos na semana',
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
        )
        ->where('calendars.start_date', '>=', Carbon::now()->startOfMonth())
        ->where('calendars.end_date', '<=', Carbon::now())
        ->groupBy('professional_id');
    }
}
