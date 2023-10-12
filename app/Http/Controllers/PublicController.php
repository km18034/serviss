<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Routing\Controller as BaseController;

class PublicController extends BaseController
{
    public function index()
    {
        $customers = Customer::first();
        return view("index", ['customer' => $customers]);
    }
}

