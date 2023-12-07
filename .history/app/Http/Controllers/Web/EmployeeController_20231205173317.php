<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;


class EmployeeController extends Controller
{
    public function index(Request $request){
        if ($request->has('search')){
            $data = Employee::where('name','LIKE','%' .$request->search.'%')->paginate(3);
        }else{
            $data = Employee::paginate(3);
        }
        return view('contents.datapegawai',compact('data'));
    }

    public function createPegawai(){
        return view('contents.createpegawai');
    }

    public function insertDataPegawai(Request $request){
        // dd($request->all());
        $data=Employee::create($request->all());

        if($request->hasFile('photo')){
            $request->file('photo')->move('photoPegawai/',$request->file('photo')->getClientOriginalName());
            $data->photo=$request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil DiTambahkan!');
    }

    public function showDataPegawai($id){
        // dd($request->all());
        $data = Employee::find($id);
        return view('contents.showpegawai',compact('data'));
        
    }

    public function updateDataPegawai(Request $request,$id){
        // dd($request->all());
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success','Data Berhasil DiUpdate!');
        
    }

    public function deleteDataPegawai($id){
        // dd($request->all());
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil DiHapus!');
        
    }

    public function exportpdf()
    {
        $data = ['title' => 'Welcome to Laravel DomPDF'];
        $pdf = PDF::loadView('pdf.view', $data);
        return $pdf->stream('document.pdf');
    }
}
