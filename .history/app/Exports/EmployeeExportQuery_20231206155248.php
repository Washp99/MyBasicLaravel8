<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class EmployeeExportQuery implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function forYear(str $gender)
    {
        $this->gender = $gender;
        
        return $this;
    }

    public function query()
    {
        return Employee::query()->where('gender', $this->gender);
    }
}
