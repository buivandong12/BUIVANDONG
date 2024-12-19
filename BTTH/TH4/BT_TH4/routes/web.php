<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;


Route::get('/', [IssuesController::class, 'index'])->name('Issue.index');

Route::get('/Issue/create', [IssuesController::class,'create'])->name('Issue.create');

Route::post('/Issue', [IssuesController::class,'store'])->name('Issue.store');

Route::get('/Issue/{Issue}/edit', [IssuesController::class,'edit'])->name('Issue.edit');

Route::put('/Issue/{Issue}', [IssuesController::class,'update'])->name('Issue.update');

Route::delete('/Issue/{Issue}', [IssuesController::class,'destroy'])->name('Issue.destroy');
