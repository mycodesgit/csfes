<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Offices;

class UserController extends Controller
{
    public function userRead()
    {
        $user = User::all();
        $office = Offices::orderBy('office_name', 'asc')->get();

        return view('users.list_user', compact('user', 'office'));
    }

    public function userCreate(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'fname' => 'required',
                'mname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required',
            ]);

            try{
                User::Create([
                    'fname' => $request->input('fname'),
                    'mname' => $request->input('mname'),
                    'lname' => $request->input('lname'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')), 
                    'role' => $request->input('role'),
                    'dept' => $request->input('dept'),
                    'campus' => $request->input('campus'),
                    'remember_token' => Str::random(60),             
                ]);      
                return redirect()->route('userRead')->with('success', 'User Save Successfully');             
            }catch(\Exception $e) {
                return redirect()->route('userRead')->with('error', 'Failed to Save User');
            }
        }
    }
}
