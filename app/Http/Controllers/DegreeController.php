<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
   
    public function index()
    {
        $degrees =  Degree::all();
        return view ('degrees.index',compact('degrees'));
    }

  
    public function create()
    {
        //
    }

    
    public function store(StoreDegreeRequest $request)
    {
        try {
            $validated = $request->validated();
            Degree::create([
                'name' => $request->name,
                ]);
    
                session()->flash('Add_degree');
                return redirect('/degrees');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }

   
    public function show(Degree $degree)
    {
        //
    }

   
    public function edit(Degree $degree)
    {
        //
    }

    
    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        //
    }

    
    public function destroy(Request $request)
    {
        try {
        $degree = Degree::where('id', $request->degree_id)->first();
        $degree->delete();
        session()->flash('delete_degree');
        return redirect('/degrees');
    }
    
    catch (\Exception $e){
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
     
    }



}
