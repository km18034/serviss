<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    public function index ()
    {
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();

        return view('public.profile')->with(compact([
            'customer',
        ]));
    }

    public function editIndex($id)
    {
        $customer = Customer::where("id", $id)->first();

        return view('public.edit-profile')->with(compact([
            'customer',
        ]));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::where("id", $id)->first();
        $customer->name = $request->input("name");
        $customer->surname = $request->input("surname");
        $customer->email = $request->input("email");
        $customer->phone = $request->input("phone");
        
        $password = $request->input("password");
        
        if ($password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $customer->password = $password;
        }

        $customer->save();

        return redirect('/profile')->with('success', 'Profile Updated Successfully!');
    }

    public function delete($id) 
    {
        $customer = Customer::where("id", $id)->first();
        $customer->delete();

        session()->forget('customer_id');

        return redirect('/');
    }
}
