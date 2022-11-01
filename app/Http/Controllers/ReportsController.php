<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Dept;
use App\Models\Degree;
use App\Models\Faculty;
use App\Models\Gender;
use App\Models\Admissiontype;

class ReportsController extends Controller
{
   
    public function index(Request $request)
    { 
       
        return view ('reports.index');
    }

    public function create()
    {
        $depts =  Dept::all();
        $admissiontypes =  Admissiontype::all();
        $degrees =  Degree::all();
        $faculties =  Faculty::all()->pluck('name','id');
        $genders =  Gender::all();
        //dd($faculties->toArray());
        return view ('reports.create',compact('admissiontypes','degrees','faculties','genders','depts'));
    }

    public function GetReportResult(Request $request)
    { 
        if ($request->dept == 'all')
        {
            try {

                $faculty_id = $request->faculty_id;
                $admissiontype_id = $request->admissiontype_id;
                $degree_id = $request->degree_id;
                $students = Student::Where('faculty_id',$faculty_id)
                ->Where('admissiontype_id',$admissiontype_id)
                ->get();
               
                 }
            
                  catch (\Exception $e){
                  return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                  }
        }
        else
        {

            try {

                $faculty_id = $request->faculty_id;
                $dept_id = $request->dept;
                $admissiontype_id = $request->admissiontype_id;
                $degree_id = $request->degree_id;
                $students = Student::Where('faculty_id',$faculty_id)
                ->Where('dept_id',$dept_id)
                ->get();
               
                 } //end of try
            
                  catch (\Exception $e){
                  return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                  }

        }
        
        

        return view ('reports.GetReportResult',compact('students'));

    }

    public function GetFacultiesViewReports()
    {
        $depts =  Dept::all();
        $admissiontypes =  Admissiontype::all();
        $degrees =  Degree::all();
        $faculties =  Faculty::all()->pluck('name','id');
        $genders =  Gender::all();
        //dd($faculties->toArray());
        return view ('reports.GetFacultiesViewReports',compact('admissiontypes','degrees','faculties','genders','depts'));
    }

    public function GetFacultiesResult(Request $request)
    { 
        //dd($request->all());
        try {

        $faculty_id = $request->faculty_id;
        $dept_id = $request->dept;
        $admissiontype_id = $request->admissiontype_id;
        $degree_id = $request->degree_id;

        $students = Student::Where('faculty_id',$faculty_id)
        ->Where('dept_id',$dept_id)
        ->get();
       
         } //end of try
    
          catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }

        return view ('reports.GetFacultiesResult',compact('students'));

    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }






}
