<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $admin_user = AdminUser::find(session('admin_id')); 

        return view('admin.cars')->with(compact([  
            'admin_user',
        ]));
    }

    public function addBrandFormIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));     

        return view('admin.add-auto-brand')->with(compact([ 
            'admin_user',
        ]));
    }

    public function addModelFormIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));     

        return view('admin.add-auto-model')->with(compact([ 
            'admin_user'
        ]));
    }
}
