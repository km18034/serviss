<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = AdminUser::where('email', $email)->first();

        if(!$admin){
            return redirect()->back()->with('error', 'Wrong Login Data!');
        }

        $admin_password = $admin->password;
        $password_verified = password_verify($password, $admin_password);

        if ($password_verified){
            session(['admin_id'=> $admin->id]);

            return redirect('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Wrong Login Data!');
        }
    }

    public function dashboard()
    {
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.dashboard')->with(compact([
            'admin_user',
        ]));
    }

    public function logout()
    {
        session()->forget('admin_id');

        return redirect('/admin');
    }
}

