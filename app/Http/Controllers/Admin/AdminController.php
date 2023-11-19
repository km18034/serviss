<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use App\Models\Application;
use App\Models\ApplicationSparePart;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = AdminUser::where('email', $email)->first();

        if(!$admin){
            return redirect()->back()->with('error', 'Wrong Login Data!');
        }

        $admin_password = $admin->password;
        $password_verified = password_verify($password, $admin_password);

        if ($password_verified){
            session(['admin_id'=> $admin->id]);

            return redirect('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Wrong Login Data!');
        }
    }

    public function dashboard()
    {
        $admin_user = AdminUser::find(session('admin_id'));
        $applications = Application::orderByDesc('id')->paginate(10);
        $spare_parts = SparePart::where('is_aviable', true)->get();

        return view('admin.dashboard')->with(compact([
            'admin_user',
            'applications',
            'spare_parts'
        ]));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::find($id);
        $application->status = $request->input('status');

        $application->save();
        return redirect()->back()->with('success', 'Application Status Updated Successfully!');
    }

    public function viewApplication($id)
    {
        $admin_user = AdminUser::find(session('admin_id'));
        $application = Application::where('id', $id)->first();

        return view('admin.view-application')->with(compact(
            'admin_user',
            'application',
        ));
    }

    public function deleteApplication($id)
    {
        $application = Application::where('id', $id)->first();
        $application->delete();
        
        return redirect()->back()->with('success', 'Application Deleted Successfully!');
    }

    public function logout()
    {
        session()->forget('admin_id');

        return redirect('/admin');
    }

    public function profileIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.profile')->with(compact([
            'admin_user',
        ]));
    }

    public function editProfileIndex($id)
    {
        $admin_user = AdminUser::where("id", $id)->first();

        return view('admin.edit-profile')->with(compact([
            'admin_user',
        ]));
    }

    public function updateProfile(Request $request, $id)
    {
        $admin_user = AdminUser::where("id", $id)->first();
        $admin_user->name = $request->input("name");
        $admin_user->surname = $request->input("surname");
        $admin_user->email = $request->input("email");
        $admin_user->phone = $request->input("phone");

        if ($admin_user->role === 'mechanic') {
            $admin_user->role = 'mechanic';
        } else {
            $admin_user->role = $request->input("role");
        }

        $password = $request->input("password");
        
        if ($password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $admin_user->password = $password;
        }

        $admin_user->save();

        return redirect()->route('admin-profile-index')->with('success', 'Profile Updated Successfully!');
    }

    public function deleteProfile($id)
    {
        $admin = AdminUser::where("id", $id)->first();
        $admin->delete();

        session()->forget('admin_id');

        return redirect('/');
    }

    public function saveSparePartAmount(Request $request, $id) // $id ir application id
    {
        $data = $request->all();
        /**
        *  "_token" => "Sgj2ULTNYxgVqzdtohBdraZwdAcOneu4HXN03cwQ"
        *  1 => null
        *  2 => null
        *  3 => null
        *  4 => 3
        */

        unset($data['_token']); //ignorējam csrf token. 

        foreach ($data as $partId => $amount) { //$partId ir spare parts id ; $amount ir order amount
            if (is_null($amount)) { // ja ir null, tad nekas netiek ssaglabāts
                continue;
            }

            $application_spare_part = new ApplicationSparePart();
            $application_spare_part->application_id = $id;
            $application_spare_part->spare_part_id = $partId;
            $application_spare_part->amount = $amount;

            $spare_part = $application_spare_part->sparePart;
            $spare_part->amount = $spare_part->amount - $amount;

            if ($spare_part->amount < 0) {
                return redirect()->back() 
                ->with('error', 'Please choose smaller amount!');
            }

            $application_spare_part->save();
            $spare_part->save();
        }

        return redirect()->route('admin-dashboard');
    }

    public function filterApplication($id)
    {
        $admin_user = AdminUser::where("id", $id)->first();
        $applications = Application::where("mechanic_id", $id)->orderByDesc('id')->paginate(10);
        $spare_parts = SparePart::where('is_aviable', true)->get();

        return view('admin.dashboard')->with(compact([
            'admin_user',
            'applications',
            'spare_parts',
        ]));
    }
}

