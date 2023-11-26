<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\AutoBrand;
use App\Models\AutoModel;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $admin_user = AdminUser::find(session('admin_id')); 
        $auto_models = AutoModel::all();

        return view('admin.cars')->with(compact([  
            'admin_user',
            'auto_models',
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
        $auto_brands = AutoBrand::all();  
        $auto_models = AutoModel::all();

        return view('admin.add-auto-model')->with(compact([ 
            'admin_user',
            'auto_brands',
            'auto_models',
        ]));
    }

    public function createAutoBrand(Request $request)
    {
        $is_public = $request->input('is_public') ? 1 : 0;

        $auto_brand = new AutoBrand();
        $auto_brand->title = $request->input('title');
        $auto_brand->is_public = $is_public;

        $auto_brand->save();

        return redirect()->route('admin-auto-brands-index')->with('success', 'Auto Brand Created Successfully!');
    }

    public function createAutoModel(Request $request)
    {
        $is_public = $request->input('is_public') ? 1 : 0;

        $auto_model = new AutoModel();
        $auto_model->title = $request->input('title');
        $auto_model->auto_brand_id = $request->input('auto_brand_id');
        $auto_model->is_public = $is_public;

        $auto_model->save();

        return redirect()->route('admin-cars-index')->with('success', 'Auto Model Created Successfully!');
    }

    public function editIndex($id)
    {
        $auto_model = AutoModel::find($id);
        $auto_brands = AutoBrand::all();
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.edit-car')->with(compact([
            'auto_model',
            'admin_user',
            'auto_brands',
        ]));
    }

    public function update(Request $request, $id)
    {
        $car = AutoModel::find($id);
        $is_public = $request->input('is_public') ? 1 : 0;
        $car->title = $request->input('title');
        $car->auto_brand_id = $request->input('auto_brand_id');
        $car->is_public = $is_public;

        $car->save();

        return redirect()->route('admin-cars-index')->with('success', 'Car Information Updated Successfully!');
    }

    public function autoBrandsIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));   
        $auto_brands = AutoBrand::all();  
        
        return view('admin.auto-brands')->with(compact([ 
            'admin_user',
            'auto_brands',
        ]));
    }

    public function brandEditIndex($id)
    {
        $auto_brand = AutoBrand::find($id);
        $admin_user = AdminUser::find(session('admin_id'));

        return view('admin.edit-auto-brand')->with(compact([
            'admin_user',
            'auto_brand',
        ]));
    }

    public function updateBrand(Request $request, $id)
    {
        $auto_brand = AutoBrand::find($id);
        $is_public = $request->input('is_public') ? 1 : 0;
        $auto_brand->title = $request->input('title');
        $auto_brand->is_public = $is_public;

        $auto_brand->save();

        return redirect()->route('admin-auto-brands-index')->with('success', 'Auto Brand Updated Successfully!');
    }
}
