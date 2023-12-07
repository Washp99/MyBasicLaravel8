<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeExportFormView implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    return view('contents.datapegawai', [
        'invoices' => Employee::all()
    ]);
}
