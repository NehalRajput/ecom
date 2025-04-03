<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //this method will return the admin dashboard view
    public function index(){
        return view('admin.dashboard');
    }
}
