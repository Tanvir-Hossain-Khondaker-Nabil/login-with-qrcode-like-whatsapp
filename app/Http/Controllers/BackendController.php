<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function index(){
        return view('backend.index');
    }
    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
