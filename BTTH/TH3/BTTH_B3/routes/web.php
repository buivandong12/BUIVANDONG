<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;



Route::get('/', [SaleController::class, 'index'])->name('sale.index');
Route::get('/sale/create', [SaleController::class,'create'])->name('sale.create');
Route::post('/sale', [SaleController::class,'store'])->name('sale.store');
Route::get('/sale/{sale}/edit', [SaleController::class,'edit'])->name('sale.edit');
Route::put('/sale/{sale}', [SaleController::class,'update'])->name('sale.update');
Route::delete('/sale/{sale}', [SaleController::class,'destroy'])->name('sale.destroy');