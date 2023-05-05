<?php

namespace App\Http\Controllers\Admin;

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
            return redirect()->route('admin.dashboard')->with('true', 'Đăng nhập thành công!');
        }
        return redirect()->back()->with('false', 'Tài khoản hoặc mật khẩu không chính xác, thử lại!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
}
