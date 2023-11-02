<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminRegisterController extends BaseController
{
    public function index()
    {
        $users = AdminUser::all();
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.users')->with(compact([
            'admin_user',
            'users',
        ]));
    }

    public function addFormIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.add-user')->with(compact([
            'admin_user',
        ]));
    }

    public function create(Request $request)
    {
        $request->validate([       
            'name' => 'required|max:255',
            'surname' => 'required',
            'email' => 'required|email|unique:admin_user',
            'phone' => 'required',
            'role' => 'required', 
            'password' => 'required',
        ]);

        $password = password_hash($request->input("password"), PASSWORD_DEFAULT);

        $user = New AdminUser();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->password = $password;

        $user->save();

        return redirect()->route('admin-users-index')   
                ->with('success', 'User Created Successfully!');
    }

    public function delete($id)
    {
        $user = AdminUser::where('id', $id)->first();
        $user->delete();

        return redirect()->back()
                ->with('success', 'User Deleted Successfully!');
    }

    public function editIndex($id)
    {
        $user = AdminUser::find($id);
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.edit-user')->with(compact([
            'user',
            'admin_user',
        ]));
    }

    public function update(Request $request, $id)
    {
        $user = AdminUser::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');

        $password = $request->input("password");
        
        if ($password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user->password = $password;
        }

        $user->save();

        return redirect()->route('admin-users-index')->with('success', 'User Information Updated Successfully!');
    }
}