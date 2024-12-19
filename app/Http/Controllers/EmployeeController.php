<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(){
        dd('ini halaman employee');
        // $data = User::with('employee')->get();
        // dd($data);
    }
}
