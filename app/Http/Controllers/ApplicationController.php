<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Customer;
use App\Models\AutoModel;
use App\Models\Service;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();
        $applications = Application::where('customer_id', $customer_id)->paginate(10);

        return view('public.applications', [
            'applications' => $applications,
            'customer' => $customer,
        ]);
    }

    public function indexForm()
    {
        $customer_id = session('customer_id');
        $customer = Customer::where("id", $customer_id)->first();
        $services = Service::where("is_public", true)->get();
        $cars = AutoModel::where("is_public", true)->get();
        $mechanics = AdminUser::where("role", 'mechanic')->get();

        $tomorrow = Carbon::now()->addDay()->toDateString();
        $month_later = Carbon::now()->addMonth()->toDateString();
        
        return view('public.create-application')->with(compact([
            'customer',
            'services',
            'mechanics',
            'cars',
            'tomorrow',
            'month_later',
        ]));
    }

    public function submit(Request $request)
    {
        $application = new Application();
        $application->customer_id = session('customer_id');
        $application->auto_model_id = $request->input('auto_model_id');
        $application->date = $request->input('date');
        $application->description = $request->input('description');
        $application->service_id = $request->input('service_id');
        $application->mechanic_id = $request->input('mechanic_id');
        
        $application->save();
        
        return redirect('/applications')->with('success', 'Application Created Successfully!');
    }

    public function cancle($id) //funkcija, lai dzestu application
    {
        $application = Application::where('id', $id)->first();
        $application->status = 'canceled';

        $application->save();
        
        return redirect()->back()->with('success', 'Application Canceled Successfully!');
    }
}
