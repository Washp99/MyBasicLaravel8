<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();
        return view('contents.datapegawai',compact('data'));
    }

    public function createPegawai(){
        return view('contents.createpegawai');
    }
}
