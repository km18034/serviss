<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Service;

class ServicesController extends BaseController
{
    public function index()
    {
        $services = Service::all();
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.services')->with(compact([
            'admin_user',
            'services',
        ]));;
    }

    public function addFormIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.add-service')->with(compact([
            'admin_user',
        ]));
    }

    public function editIndex($id)
    {
        $service = Service::find($id);
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.edit-service')->with(compact([
            'service',
            'admin_user',
        ]));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $file = $request->file('image');

        $file_name = time() . '_' . $file->getClientOriginalName();
        Storage::disk('public')->put("images/".$file_name, File::get($file));

        $is_public = $request->input('is_public') ? 1 : 0;

        $service = New Service();
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->is_public = $is_public;
        $service->image_name = $file_name;

        $service->save();
        return redirect()->route('admin-services-index')->with('success', 'Service Created Successfully!');
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $file = $request->file('image');

        if ($file) {
            $file_path = "images/" . $service->image_name;

            if (Storage::disk("public")->exists($file_path)) {
                Storage::disk("public")->delete($file_path);
            }   
            
            $file_name = time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put("images/".$file_name, File::get($file));

            $service->image_name = $file_name;
        }

        $is_public= $request->input('is_public') ? 1 : 0;

        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->is_public = $is_public;

        $service->save();

        return redirect()->route('admin-services-index')->with('success', 'Application Updated Successfully!');
    }
  
    public function delete($id)
    {
        $service = Service::where('id', $id)->first();
        $service->delete();

        $file_path = "images/" . $service->image_name;

        if (Storage::disk("public")->exists($file_path)) {
            Storage::disk("public")->delete($file_path);
        }

        return redirect()->back()->with('success', 'Service Deleted Successfully!');
    }
}
