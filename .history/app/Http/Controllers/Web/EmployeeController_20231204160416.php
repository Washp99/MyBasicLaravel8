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

    public function insertDataPegawai(Request $request){
        // dd($request->all());
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('success','Data Berhasil diTambahkan!');
    }

    public function showDataPegawai($id){
        // dd($request->all());
        $data = Employee::find($id);
        return view('showDataPegawai',compact('data'));
        
    }
}
