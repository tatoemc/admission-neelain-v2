<?php

namespace App\Http\Controllers;

use App\Models\Admissiontype;
use App\Http\Requests\StoreAdmissiontypeRequest;
use App\Http\Requests\UpdateAdmissiontypeRequest;

class AdmissiontypeController extends Controller
{

    function __construct() 
    { 
 
      $this->middleware('permission:عرض برنامج', ['only' => ['index']]);
      $this->middleware('permission:اضافة برنامج', ['only' => ['create','store']]);
      $this->middleware('permission:تعديل برنامج', ['only' => ['edit','update']]);
      $this->middleware('permission:حذف برنامج', ['only' => ['destroy']]);
 
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
        //
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

    public function destroy(Admissiontype $admissiontype)
    {
        //
    }




}
