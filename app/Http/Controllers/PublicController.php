<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class PublicController extends BaseController
{
    public function index()
    {
        return view('public.services');
    }

    public function mechanicsIndex()
    {
        return view('public.mechanics');
    }
}

