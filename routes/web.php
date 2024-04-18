<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [VisitorController::class, 'index'])->name('Vpage');
Route::get('/home', [VisitorController::class, 'index'])->name('Vpage');
Auth::routes();


//categories
Route::get('/category', [CategoryController::class, 'show'])->name('cat.show')->middleware('auth');

Route::post('/category/store', [CategoryController::class, 'store'])->name('cat.store')->middleware('auth');

Route::get('/category/{id}', [CategoryController::class, 'delete'])->name('cat.delete')->middleware('auth');

Route::post('/category/update', [CategoryController::class, 'update'])->name('cat.update')->middleware('auth');


//voiture
Route::get('/voiture/index', [VoitureController::class, 'index'])->name('voiture.index');

Route::get('/voiture/create', [VoitureController::class, 'create'])->name('voiture.create')->middleware('auth');

Route::post('/voiture/store', [VoitureController::class, 'store'])->name('voiture.store')->middleware('auth');

Route::get('/voiture/edit/{id}', [VoitureController::class, 'edit'])->name('voiture.edit')->middleware('auth');

Route::post('/voiture/update/{id}', [VoitureController::class, 'update'])->name('voiture.update')->middleware('auth');

Route::get('/voiture/show/{id}', [VoitureController::class, 'show_details'])->name('voiture.details');

Route::get('/voiture/delete/{id}', [VoitureController::class, 'delete'])->name('voiture.delete')->middleware('auth');

