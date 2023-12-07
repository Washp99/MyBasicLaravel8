<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class EmployeeExport implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function forYear(int $gender)
    {
        $this->gender = $gender;
        
        return $this;
    }
    public function collection()
    {
        return Employee::query()->whereYear('gender', $this->gender);
    }
}
