<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function index()
    {
        return view('public.login');
    }

    public function login (Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);
        
        $email = $request->input('email');
        $password = $request->input('password');
       
        $customer = Customer::where('email', $email)->first();
        $customer_password = $customer->password;
        $password_verified = password_verify($password, $customer_password);

        if ($password_verified){
            session(['customer_id'=> $customer->id]);

            return redirect('/applications');
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        session()->forget('customer_id');

        return redirect('/');
    }
}
