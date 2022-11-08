<?php

namespace App\Http\Controllers;

use App\Models\Admissiontype;
use App\Http\Requests\StoreAdmissiontypeRequest;
use App\Http\Requests\UpdateAdmissiontypeRequest;
use Illuminate\Http\Request;

class AdmissiontypeController extends Controller
{

    function __construct() 
    { 
 
      $this->middleware('permission:عرض القبول', ['only' => ['index']]);
      $this->middleware('permission:اضافة القبول', ['only' => ['create','store']]);
      $this->middleware('permission:تعديل القبول', ['only' => ['edit','update']]);
      $this->middleware('permission:حذف القبول', ['only' => ['destroy']]);
 
     }
    
    public function index()
    {
        $admissiontypes =  Admissiontype::all();
        return view ('admissiontypes.index',compact('admissiontypes'));
    }

  
    public function create()
    {
        //
    }
   
    public function store(StoreAdmissiontypeRequest $request)
    {
        try {
            $validated = $request->validated();
            Admissiontype::create([
                'name' => $request->name,
                ]);
    
                session()->flash('Add_admissiontype');
                return redirect('/admissiontypes');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function show(Admissiontype $admissiontype)
    {
        //
    }

    public function edit(Admissiontype $admissiontype)
    {
        //
    }

    public function update(UpdateAdmissiontypeRequest $request, Admissiontype $admissiontype)
    {
        //
    }

    public function destroy(Request $request)
    {
        try {
        $admissiontype = Admissiontype::where('id', $request->admissiontype_id)->first();
        $admissiontype->delete();

        session()->flash('delete_admissiontype');
        return redirect('/admissiontypes');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
             

    }




}
