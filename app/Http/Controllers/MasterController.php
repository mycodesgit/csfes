<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    public function home()
    {
        return view('home.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}
