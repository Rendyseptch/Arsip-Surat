<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\UserManagementController;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['title' => 'Home Page', 'name' => 'Rendy Septian']);
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // error page
    Route::get('/error-page', function () {
        return view('erorr-page');
    })->name('error-page');
});



// start route arsip
Route::get('/arsip', [ArsipController::class, 'index'])->name('list-arsip');
Route::get('/arsip/{id}', [ArsipController::class, 'detail'])->name('detail-arsip');
Route::get('/create-arsip', [ArsipController::class, 'create'])->name('create-arsip');
Route::post('/store-arsip', [ArsipController::class, 'store'])->name('store-arsip');
Route::get('/edit-arsip/{id}', [ArsipController::class, 'edit'])->name('edit-arsip');
Route::post('/update-arsip', [ArsipController::class, 'update'])->name('update-arsip');
Route::post('/attach', [ArsipController::class, 'attach'])->name('attach');
Route::post('/delete-arsip', [ArsipController::class, 'destroy'])->name('destroy.arsip');
// end route arsip


Route::group(['middleware' => ['isAdmin'], 'prefix' => 'jabatan'], function () {
    // Admin ROLE
    Route::get('/', [JabatanController::class, 'index']);
    Route::post('/create-jabatan', [JabatanController::class, 'createJabatan'])->name('create-jabatan');
    Route::post('/delete-jabatan', [JabatanController::class, 'deleteJabatan'])->name('destroy.jabatan');
    Route::post('/create-pangkat', [JabatanController::class, 'createPangkat'])->name('create-pangkat');
    Route::post('/delete-pangkat', [JabatanController::class, 'deletePangkat'])->name('destroy.pangkat');
});

Route::group(['middleware' => ['isAdmin'], 'prefix' => 'user-managements'], function () {
    // Admin ROLE
    Route::get('/', [UserManagementController::class, 'index']);
    Route::get('/detail/{id}', [UserManagementController::class, 'detail'])->name('detail.pegawai');
    Route::get('/create', [UserManagementController::class, 'create'])->name('create.pegawai');
    Route::post('/store', [UserManagementController::class, 'store'])->name('store.pegawai');
    Route::get('/edit/{id}', [UserManagementController::class, 'edit'])->name('edit.pegawai');
    Route::post('/update', [UserManagementController::class, 'update'])->name('update.pegawai');
    Route::post('/delete', [UserManagementController::class, 'destroy'])->name('destroy.pegawai');
});


// kurang clean dan kurang mengikuti best patern
// Route::get('/hello', function(){
//     return view('hello');
// });
// Route::get('/hello',[HelloController::class,'index']);
// Route::get('/pengalaman', [PengalamanController::class,'pengalaman']);
Route::get('/hello/edit', [HelloController::class, 'edit']);
Route::get('/employee', [EmployeeController::class, 'index']);
