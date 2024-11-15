<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;

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
    return view('home');
});

Route::prefix('/rental')->name('rental.')->group(function(){
    Route::get('data-motor', [RentalController::class, 'index'])->name('data_rental');
    Route::get('tambah-data', [RentalController::class, 'create'])->name('tambah_data');
    Route::post('tambah-data', [RentalController::class, 'store'])->name('tambah_data.form');
    Route::get('/edit/{id}', [RentalController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [RentalController::class, 'update'])->name('edit.formulir');
    Route::delete('/delete/{id}', [RentalController::class, 'destroy'])->name('delete');
});
