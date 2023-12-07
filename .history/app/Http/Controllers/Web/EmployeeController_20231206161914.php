<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;
use Carbon\Carbon;
use App\Exports\EmployeeExport;
use App\Exports\EmployeeExportQuery;
use App\Exports\EmployeeExportMap;
use Maatwebsite\Excel\Facades\Excel;



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
        $data = Employee::all();
        view()->share('data',$data);
        $pdf = PDF::loadview('contents.datapegawai-pdf');
        return $pdf->download('data-pegawai.pdf');
    }

    public function exportexcel()
    {
        // return Excel::download(new EmployeeExport, 'datapegawai'.Carbon::now()->timestamp.'.xlsx');
        return (new EmployeeExport)->download('datapegawai'.Carbon::now()->timestamp.'.xlsx');
    }

    public function exportexcelgender(Request $request)
    {
        // return Excel::download(new EmployeeExport, 'datapegawai'.Carbon::now()->timestamp.'.xlsx');
        return (new EmployeeExportQuery)->forGender($request->gender)->download('datapegawai'.Carbon::now()->timestamp.'.xlsx');
    }

    public function exportexcelmap(Request $request)
    {
        // return Excel::download(new EmployeeExport, 'datapegawai'.Carbon::now()->timestamp.'.xlsx');
        return (new EmployeeExportQuery)->download('datapegawai'.Carbon::now()->timestamp.'.xlsx');
    }
}
