// app/Exports/EmployeeExport.php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Employee;

class EmployeeExport implements FromCollection
{
    public function collection()
    {
        return Employee::all();
    }
}
