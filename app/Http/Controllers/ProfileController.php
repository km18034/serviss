<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    public function index ()
    {
        return view('public.profile');
    }
}
