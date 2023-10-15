<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SparePartsController extends BaseController
{
    public function index()
    {
        $spare_parts = SparePart::all();
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.spare-parts')->with(compact([
            'spare_parts', 
            'admin_user',
        ]));
    }

    public function addFormIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.add-spare-part')->with(compact([
            'admin_user',
        ]));
    }

    public function editIndex($id) 
    {
        $part = SparePart::find($id);
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.edit-spare-part')->with(compact([
            'part',
            'admin_user',
        ]));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'auto_brand' => 'required',
            'amount' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $file = $request->file('image');

        $file_name = time() . '_' . $file->getClientOriginalName();
        Storage::disk('public')->put("images/".$file_name, File::get($file));

        $is_aviable = $request->input('is_aviable') ? 1 : 0;

        $part = New SparePart();
        $part->title = $request->input('title');
        $part->description = $request->input('description');
        $part->auto_brand = $request->input('auto_brand');
        $part->amount = $request->input('amount');
        $part->is_aviable = $is_aviable;
        $part->image_name = $file_name;

        $part->save();
        return redirect('/admin/spare-parts')->with('success', 'Spare Part Created Successfully!');
    }

    public function update(Request $request, $id)
    {
        $part = SparePart::find($id);
        $file = $request->file('image');

        if ($file) {
            $file_path = "images/" . $part->image_name;

            if (Storage::disk("public")->exists($file_path)) {
                Storage::disk("public")->delete($file_path);
            }   
            
            $file_name = time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put("images/".$file_name, File::get($file));

            $part->image_name = $file_name;
        }

        $is_aviable = $request->input('is_aviable') ? 1 : 0;

        $part->title = $request->input('title');
        $part->description = $request->input('description');
        $part->auto_brand = $request->input('auto_brand');
        $part->amount = $request->input('amount');
        $part->is_aviable = $is_aviable;

        $part->save();

        return redirect("/admin/spare-parts")->with('success', 'Application Updated Successfully!');
    }

    public function delete($id)
    {
        $part = SparePart::where('id', $id)->first();
        $part->delete();

        $file_path = "images/" . $part->image_name;

        if (Storage::disk("public")->exists($file_path)) {
            Storage::disk("public")->delete($file_path);
        }

        return redirect()->back()->with('success', 'Application Deleted Successfully!');
    }
}
