<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        if ($request->has('search')){
            $data = Employee::where('name','LIKE','%',.$request->search);
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
}
