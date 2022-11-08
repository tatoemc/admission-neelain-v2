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
        
        //dd($request->all());
        
        try {
            $faculty_id = $request->faculty_id;
            $dept_id = $request->dept;
            $admissiontype_id = $request->admissiontype_id;
            $degree_id = $request->degree_id;
            $year = $request->year;


            if ($request->dept == "0")
        {
            if($request->admissiontype_id == "0" && $request->degree_id == "0" && $request->year == "0")
            {
                $students = Student::where('faculty_id',$faculty_id)
                //->where('ENTS',$request->year)
                //->where('admissiontype_id',$admissiontype_id)
                //->where('degree_id',$degree_id)
                ->get();
            }
            elseif ($request->admissiontype_id == "0" && $request->degree_id == "0")
             {

                $students = Student::where('faculty_id',$faculty_id)
                ->where('ENTS',$request->year)
                //->where('admissiontype_id',$admissiontype_id)
                //->where('degree_id',$degree_id)
                ->get();
            }
            elseif ($request->admissiontype_id == "0"  && $request->year == "0")
             {

                $students = Student::where('faculty_id',$faculty_id)
                //->where('ENTS',$request->year)
                //->where('admissiontype_id',$admissiontype_id)
                ->where('degree_id',$degree_id)
                ->get();
            }
            elseif ( $request->degree_id == "0" && $request->year == "0")
             {

                $students = Student::where('faculty_id',$faculty_id)
                //->where('ENTS',$request->year)
                ->where('admissiontype_id',$admissiontype_id)
               // ->where('degree_id',$degree_id)
                ->get();
            }
            elseif ( $request->degree_id == "0")
            {

               $students = Student::where('faculty_id',$faculty_id)
               //->where('ENTS',$request->year)
               ->where('admissiontype_id',$admissiontype_id)
               ->where('degree_id',$degree_id)
               ->get();
           }
           elseif ( $request->admissiontype_id == "0")
           {

              $students = Student::where('faculty_id',$faculty_id)
              ->where('ENTS',$request->year)
              //->where('admissiontype_id',$admissiontype_id)
              ->where('degree_id',$degree_id)
              ->get();
          }
          elseif ( $request->year == "0")
           {

              $students = Student::where('faculty_id',$faculty_id)
              //->where('ENTS',$request->year)
              ->where('admissiontype_id',$admissiontype_id)
              ->where('degree_id',$degree_id)
              ->get();
          }
        }
        else

        {   
           
            if($request->admissiontype_id == "0" && $request->degree_id == "0" && $request->year == "0")
            {
                $students = Student::where('faculty_id',$faculty_id)
                //->where('ENTS',$request->year)
                 ->where('dept_id',$dept_id)
                //->where('degree_id',$degree_id)
                ->get();
            }
            elseif ($request->admissiontype_id == "0" && $request->degree_id == "0")
             {

                $students = Student::where('faculty_id',$faculty_id)
                ->where('ENTS',$request->year)
                 ->where('dept_id',$dept_id)
                //->where('degree_id',$degree_id)
                ->get();
            }
            elseif ($request->admissiontype_id == "0"  && $request->year == "0")
             {

                $students = Student::where('faculty_id',$faculty_id)
                //->where('ENTS',$request->year)
                ->where('dept_id',$dept_id)
                ->where('degree_id',$degree_id)
                ->get();
            }
            elseif ( $request->degree_id == "0" && $request->year == "0")
             {

                $students = Student::where('faculty_id',$faculty_id)
                 ->where('dept_id',$dept_id)
                ->where('admissiontype_id',$admissiontype_id)
               // ->where('degree_id',$degree_id)
                ->get();
            }
            elseif ( $request->degree_id == "0")
            {

               $students = Student::where('faculty_id',$faculty_id)
                ->where('dept_id',$dept_id)
               ->where('admissiontype_id',$admissiontype_id)
               ->where('degree_id',$degree_id)
               ->get();
           }
           elseif ( $request->admissiontype_id == "0")
           {

              $students = Student::where('faculty_id',$faculty_id)
              ->where('dept_id',$dept_id)
              ->where('ENTS',$request->year)
              ->where('degree_id',$degree_id)
              ->get();
          }
          elseif ( $request->year == "0")
           {

              $students = Student::where('faculty_id',$faculty_id)
              ->where('dept_id',$dept_id)
              ->where('admissiontype_id',$admissiontype_id)
              ->where('degree_id',$degree_id)
              ->get();
          }
          else
          {
            $students = Student::where('faculty_id',$faculty_id)
            ->where('dept_id',$dept_id)
            ->where('admissiontype_id',$admissiontype_id)
            ->where('degree_id',$degree_id)
            ->where('ENTS',$year)
            ->get();
          }

        }



            $faculty = Faculty::where('id',$faculty_id)->first();
        $dept = Dept::where('id',$dept_id)->first();
        $admissiontype = Admissiontype::where('id',$admissiontype_id)->first(); 
        $degree = Degree::where('id',$degree_id)->first();
        
        return view ('reports.GetReportResult',compact('students','faculty','dept','admissiontype','degree','year'));

            }//End of Try
    
        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }//End of catch

        

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
