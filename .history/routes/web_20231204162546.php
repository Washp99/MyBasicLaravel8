<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pegawai',[EmployeeController::class,'index'])->name('pegawai');
Route::get('/createPegawai',[EmployeeController::class,'createPegawai'])->name('createPegawai');
Route::post('/insertDataPegawai',[EmployeeController::class,'insertDataPegawai'])->name('insertDataPegawai');
Route::get('/showDataPegawai/{id}',[EmployeeController::class,'showDataPegawai'])->name('showDataPegawai');
Route::post('/updateDataPegawai/{id}',[EmployeeController::class,'updateDataPegawai'])->name('updateDataPegawai');
Route::get('/deleteDataPegawai/{id}',[EmployeeController::class,'deleteDataPegawai'])->name('deleteDataPegawai');