<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExportMap implements FromQuery, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($employee): array
    {
        return [
            $employee->name,
            $employee->gender,
            $employee->phonenum,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Gender',
            'No.Telfon'
        ];
    }
}
