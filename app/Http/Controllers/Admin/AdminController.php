<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        
        return view('admin.dashboard');
    }

   
}
