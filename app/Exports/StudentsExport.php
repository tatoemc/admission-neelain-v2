<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection,WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $faculty_id;
    protected $dept;

    function __construct($faculty_id,$dept)
     {
        $this->faculty_id = $faculty_id;
        $this->dept_id = $dept;
     }
    
    public function collection()
    {
        try {
        return Student::select('N1', 'N2','N3', 'N4','SCHS', 'N_FACS','ENTS', 'degree_id','admissiontype_id', 'gender_id','faculty_id', 'dept_id','frmno')
        ->where('faculty_id',$this->faculty_id)
        ->where('dept_id',$this->dept)
        ->get();
        /*
        return Student::where('faculty_id',$this->faculty_id)
        ->where('dept_id',$this->dept)
        ->get()([
            'N1', 'N2','N3', 'N4','SCHS', 'N_FACS','ENTS', 'degree_id','admissiontype_id', 'gender_id','faculty_id', 'dept_id','frmno'
        ]);
        */
      }

      catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }



    }

    public function headings(): array
    {
        return ['N1', 'N2','N3', 'N4','SCHS', 'N_FACS','ENTS', 'degree_id','admissiontype_id', 'gender_id','faculty_id', 'dept_id','frmno'];
    }



}
