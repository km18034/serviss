<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();
        $applications = Application::where('customer_id', $customer_id)->get()->all();

        return view('public.applications', [
            'applications' => $applications,
            'customer' => $customer,
        ]);
    }

    public function indexForm()
    {
        return view('public.create-application');
    }

    public function submit(Request $request)
    {
        $application = new Application();
        $application->customer_id = session('customer_id');
        $application->auto_brand = $request->input('auto_brand');
        $application->date = $request->input('date');
        $application->description = $request->input('description');
        $application->save();
        
        return redirect('/applications');
    }

    public function delete($id) //funkcija, lai dzestu application
    {
        $application = Application::where('id', $id)->first();
        $application->delete();
        
        return redirect()->back();
    }
}
