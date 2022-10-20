<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use Illuminate\Http\Request;
 
class FacultyController extends Controller
{
    
    function __construct()
    { 
        
      $this->middleware('permission:عرض كلية', ['only' => ['index']]);
      $this->middleware('permission:اضافة كلية', ['only' => ['create','store']]);
      $this->middleware('permission:تعديل كلية', ['only' => ['edit','update']]);
      $this->middleware('permission:حذف كلية', ['only' => ['destroy']]);
 
     }

    public function index()
    {
         $faculties =  Faculty::all();
        return view ('faculties.index',compact('faculties'));
    }

    
    public function create()
    {
        //
    }

    public function store(StoreFacultyRequest $request)
    {
       
        try {
            $validated = $request->validated();
            Faculty::create([
                'name' => $request->name,
                ]);
    
                session()->flash('Add_faculty');
                return redirect('/faculties');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function show(Faculty $faculty)
    {
        //
    }

    public function edit(Faculty $faculty)
    {
        //
    }

    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        // faculty
    }

    public function destroy(Request $request)
    {
        
        $faculty = Faculty::where('id', $request->faculty_id)->first();
        $faculty->delete();

        session()->flash('delete_faculty');
        return redirect('/faculties');
    }


}
