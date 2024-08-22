<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $data = User::where('role', 'user')->get();
        return view('dashboard.dashboard', compact('data'));
    }
}
