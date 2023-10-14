<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function index()
    {
        return view ('public.register');
    }

    public function register (Request $request)
    {
        $password = password_hash($request->input("password"), PASSWORD_DEFAULT);
        
        $customer = new Customer();
        $customer->name = $request->input("name");
        $customer->surname = $request->input("surname");
        $customer->email = $request->input("email");
        $customer->phone = $request->input("phone");
        $customer->password = $password;
        $customer->save();
        session(['customer_id'=> $customer->id]);

        return redirect('/profile');
    }

}
