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
Route::get('/insertDataPegawai',[EmployeeController::class,'insertDataPegawai'])->name('insertDataPegawai');