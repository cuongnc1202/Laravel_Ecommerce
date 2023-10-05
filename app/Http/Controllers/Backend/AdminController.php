<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
       return view('admin.dashboard');
    }

    public function login()
    {
       return view('admin.login');
    }

    public function check_login(Request $request)
    {
       $admin = $request->only('email', 'password');
       $check = Auth::attempt($admin, $request->has('remember'));

       if ($check) {
            return redirect()->route('admin.dashboard')->with('true', 'Login successfully');
        }
        return redirect()->back()->with('false', 'Account or password is incorrect. Please try again!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
}
