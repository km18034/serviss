<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Customer;

class PublicController extends BaseController
{
    public function index()
    {
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();
        
        return view('public.services')->with(compact([
            'customer',
        ]));
    }

    public function mechanicsIndex()
    {
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();
        
        return view('public.mechanics')->with(compact([
            'customer',
        ]));
    }
}

