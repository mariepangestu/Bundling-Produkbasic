<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ImportCsvController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard',function(){
    return view('dashboard');
})->name('dashboard'); 

Route::resource('product', ProdukController::class);

Route::resource('transaction', PenjualanController::class);

Route::resource('color', WarnaController::class);

Route::resource('import', ImportCsvController::class);

// Route::group(['middleware' => 'auth'], function () {
//     Route::post('/upload', [WarnaController::class, 'upload'])->name('upload');
// });

Route::post('/upload', [WarnaController::class, 'upload'])->name('upload');
// Route::get('report-produk', [ProdukController::class,'report'])->name('produk.report');