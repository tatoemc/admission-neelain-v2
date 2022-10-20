<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use App\Models\Faculty;
use App\Http\Requests\StoreDeptRequest;
use App\Http\Requests\UpdateDeptRequest;
use Illuminate\Http\Request;

class DeptController extends Controller
{
 
    
     function __construct() 
    { 
 
      $this->middleware('permission:عرض قسم', ['only' => ['index']]);
      $this->middleware('permission:اضافة قسم', ['only' => ['create','store']]);
      $this->middleware('permission:تعديل قسم', ['only' => ['edit','update']]);
      $this->middleware('permission:حذف قسم', ['only' => ['destroy']]);
 
     }

    
    public function index()
    { 
        $depts =  Dept::all();
        $faculties =  Faculty::all();
        return view ('depts.index',compact('depts','faculties'));
    }

    public function create()
    {
        
    }

    
    public function store(StoreDeptRequest $request)
    {
        
        try {
            $validated = $request->validated();
            Dept::create([
                'name' => $request->name,
                'faculty_id' => $request->faculty_id,
                ]);
    
                session()->flash('Add_dept');
                return redirect('/depts');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }

    public function show(Dept $dept)
    {
        //
    }

    public function edit(Dept $dept)
    {
        //
    }

    public function update(UpdateDeptRequest $request, Dept $dept)
    {
        //
    }

    public function destroy(Request $request)
    {
        
        $dept = Dept::where('id', $request->dept_id)->first();
        $dept->delete();

        session()->flash('delete_dept');
        return redirect('/depts');

    }


}
