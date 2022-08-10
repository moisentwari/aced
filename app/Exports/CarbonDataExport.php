<?php

namespace App\Exports;

use App\Models\carbon_level;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CarbonDataExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(int $car)
    {
        $this->car = $car;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return carbon_level::query()->where('task_id', $this->car);
    }

    public function headings(): array
    {
        return ['#','Carbon Level','Car Id','Time','Created','Updated'];
    }
}
