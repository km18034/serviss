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
        $spare_parts = SparePart::paginate(10);    // no SparePart modeļa tiek paņemtas visas vērtības
        $admin_user = AdminUser::find(session('admin_id'));    // pēc admin_id sesijas tiek atrasts administrators, kurš pieslēdzies sistēmai

        return view('admin.spare-parts')->with(compact([    // tiek atgriezts spare-parts skats un tiek padoti 2 mainīgie
            'spare_parts', 
            'admin_user',
        ]));
    }

    public function addFormIndex()
    {
        $admin_user = AdminUser::find(session('admin_id'));     //  pēc admin_id sesijas tiek atrasts administrators, kurš pieslēdzies sistēmai

        return view('admin.add-spare-part')->with(compact([     // tiek atgriezts add-spare-part skats un tiek padots 1 mainīgais
            'admin_user',
        ]));
    }

    public function editIndex($id)  // no URL http://serviss.local/admin/edit-part/1 paņemtais id
    {
        $part = SparePart::find($id);   // SparePart DB tiek meklēts ieraksts ar konkrētu id
        $admin_user = AdminUser::find(session('admin_id')); //  pēc admin_id sesijas tiek atrasts administrators, kurš pieslēdzies sistēmai

        return view('admin.edit-spare-part')->with(compact([    // tiek atgriezts edit-spare-part skats un tiek padoti 2 mainīgie
            'part',
            'admin_user',
        ]));
    }

    // funkcija jauna Spare Part pievienošanai
    public function create(Request $request)  // $request satur informāciju par visiem ievades laukiem
    {
        $request->validate([       // tiek validēti ievades lauki
            'title' => 'required|max:255',
            'description' => 'required',
            'auto_brand' => 'required',
            'amount' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $file = $request->file('image');    // mainīgajam $file tiek piešķirta 'image' vērtība

        $file_name = time() . '_' . $file->getClientOriginalName(); // tiek piešķirts random nosaukums
        Storage::disk('public')->put("images/".$file_name, File::get($file));   // tiek saglabāts fails storage/app/public/images ar jauno nosaukumu

        $is_aviable = $request->input('is_aviable') ? 1 : 0;    // ja is_aviable ir true, pieširam vērtību 1, ja false - piešķiram 0

        $part = New SparePart();    // tiek izveidots jauns ieraksts 
        $part->title = $request->input('title'); // title kolonnā tiek piešķirta vērtība no title ievadlauka
        $part->description = $request->input('description');    // description kolonnā tiek piešķirta vērtība no description ievadlauka
        $part->auto_brand = $request->input('auto_brand');     // auto_brand kolonnā tiek piešķirta vērtība no auto_brand ievadlauka
        $part->amount = $request->input('amount');     // amount kolonnā tiek piešķirta vērtība no amount ievadlauka
        $part->is_aviable = $is_aviable;    // is_aviable kolonnā tiek piešķirta vērtība no is_aviable ievadlauka
        $part->image_name = $file_name;     // image_name kolonnā saglabājam faila nosaukumu

        $part->save(); // ieraksts tiek saglabāts DB
        
        return redirect('/admin/spare-parts')   // pēc ieraksta saglabāšanas lietotājs tiek pārvirzīts uz spare-parts skatu
                ->with('success', 'Spare Part Created Successfully!');  // tiek atrādīts paziņojums par veiksmīgu ieraksta izveidi
    }

    public function update(Request $request, $id)   // $request satur informāciju par visiem ievades laukiem, $id tiek ņemts no: '/admin/submit-edit-part/{id}' 
    {
        $part = SparePart::find($id);   // SparePart DB tiek meklēts ieraksts ar konkrētu id
        $admin_user = AdminUser::find(session('admin_id'));

        if ($admin_user->role === 'admin') {
            $file = $request->file('image'); // mainīgajam $file tiek piešķirta 'image' vērtība

            if ($file) {    // notiek pārbaude vai lietotājs ir mēģinājis augšupielādēt failu
                $file_path = "images/" . $part->image_name; // mainīgajā $file_path tiek piešķirta daļa no ceļa "images/file_name" (eksistējoša vērtība DB)
            
                if (Storage::disk("public")->exists($file_path)) {  // pārbauda vai fails joprojām eksistē 
                    Storage::disk("public")->delete($file_path);    // tiek izdzēsts eksistējošs fails
                }   

                $file_name = time() . '_' . $file->getClientOriginalName(); // jaunā faila nosaukums
                Storage::disk('public')->put("images/".$file_name, File::get($file)); // tiek saglabāts jaunais fails storage/app/public/images 

                $part->image_name = $file_name; // kolonnā image_name tiek saglabāts jaunais file_name
            }

            $is_aviable = $request->input('is_aviable') ? 1 : 0; // ja is_aviable ir true, pieširam vērtību 1, ja false - piešķiram 0

            $part->title = $request->input('title'); //  kolonnā (DB spare_parts) title tiek piešķirta vērtība no ievadlauka title 
            $part->description = $request->input('description'); // kolonnā description tiek piešķirta vērtība no ievadlauka description
            $part->auto_brand = $request->input('auto_brand'); // kolonnā auto_brand tiek piešķirta vērtība no ievadlauka auto_brand
            $part->is_aviable = $is_aviable; // kolonnā is_aviable tiek piešķirta is_aviable ,mainīgā vērtība
        }

        $part->amount = $request->input('amount'); // kolonnā amount tiek piešķirta vērtība no ievadlauka amount
        
        $part->save(); // tiek saglabāts spare_parts DB

        return redirect("/admin/spare-parts") // pēc ieraksta saglabāšanas lietotājs tiek pārvirzīts uz spare-parts skatu
                ->with('success', 'Application Updated Successfully!'); // tiek atrādīt paziņojums par veiksmīgu ieraksta editēšanu
    }

    public function delete($id) // $id tiek ņemts no URL /admin/delete-part/{id}
    {
        $part = SparePart::where('id', $id)->first(); // modulī SparePart tiek meklēts pirmā vērtība, kas atbilst id
        $part->delete(); // ieraksts tiek izdzēsts

        $file_path = "images/" . $part->image_name;  // mainīgajā $file_path tiek piešķirta daļa no ceļa "images/file_name" (eksistējoša vērtība DB)

        if (Storage::disk("public")->exists($file_path)) { // pārbauda vai fails joprojām eksistē 
            Storage::disk("public")->delete($file_path);   // tiek izdzēsts eksistējošs fails
        }

        return redirect()->back() // back() nozīmē, ka no URL /admin/delete-part/{id} lietotājs tiks pārvirzīts uz vienu URL atpakaļ, kas bija /admin/spare-parts
                ->with('success', 'Application Deleted Successfully!'); // tiek atrādīts paziņojums par veiksmīgu dzēšanu
    }
}
