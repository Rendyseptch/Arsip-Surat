<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PengalamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', ['title'=> 'Home Page', 'name'=> 'Rendy Septian']);
});

// start route arsip 
Route::get('/arsip', [ArsipController::class,'index'])->name('list-arsip');
Route::get('/create-arsip',[ArsipController::class,'create'])->name('create-arsip');
Route::post('/store-arsip',[ArsipController::class,'store'])->name('store-arsip');
// end route arsip


Route::get('/kategori', function () {
    return view('kategori', ['title'=> 'Kategori Dokumen']);
});
// kurang clean dan kurang mengikuti best patern 
// Route::get('/hello', function(){
//     return view('hello');
// });
// Route::get('/hello',[HelloController::class,'index']);
// Route::get('/pengalaman', [PengalamanController::class,'pengalaman']);
Route::get('/hello/edit', [HelloController::class,'edit']);
Route::get('/employee', [EmployeeController::class, 'index']);