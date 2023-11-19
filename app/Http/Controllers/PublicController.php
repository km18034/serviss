<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Customer;
use App\Models\Service;
use App\Models\AdminUser;

class PublicController extends BaseController
{
    public function index()
    {
        $services = Service::where("is_public", true)->get();
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();
        
        return view('public.services')->with(compact([
            'customer',
            'services',
        ]));
    }

    public function mechanicsIndex()
    {
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();
        $mechanics = AdminUser::where("role", 'mechanic')->get()->all();
        
        return view('public.mechanics')->with(compact([
            'customer',
            'mechanics',
        ]));
    }
}

