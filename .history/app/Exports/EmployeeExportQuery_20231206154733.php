<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;

class EmployeeExportQuery implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function forYear(int $gender)
    {
        $this->gender = $gender;
        
        return $this;
    }

    public function query()
    {
        return Employee::query()->where('gender', $this->gender);
    }
}
