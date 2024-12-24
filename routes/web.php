<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PengalamanController;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['title' => 'Home Page', 'name' => 'Rendy Septian']);
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



// start route arsip
Route::get('/arsip', [ArsipController::class, 'index'])->name('list-arsip');
Route::get('/arsip/{id}', [ArsipController::class, 'detail'])->name('detail-arsip');
Route::get('/create-arsip', [ArsipController::class, 'create'])->name('create-arsip');
Route::post('/store-arsip', [ArsipController::class, 'store'])->name('store-arsip');
Route::get('/edit-arsip/{id}', [ArsipController::class, 'edit'])->name('edit-arsip');
Route::post('/update-arsip', [ArsipController::class, 'update'])->name('update-arsip');
Route::post('/delete-arsip', [ArsipController::class, 'destroy'])->name('destroy.arsip');
// end route arsip


Route::get('/kategori', function () {
    return view('kategori', ['title' => 'Kategori Dokumen']);
});
// kurang clean dan kurang mengikuti best patern
// Route::get('/hello', function(){
//     return view('hello');
// });
// Route::get('/hello',[HelloController::class,'index']);
// Route::get('/pengalaman', [PengalamanController::class,'pengalaman']);
Route::get('/hello/edit', [HelloController::class, 'edit']);
Route::get('/employee', [EmployeeController::class, 'index']);
