<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Doc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Auth;


 
class ImportStudent implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
 
    public function model(array $row)
    {
        
        $doc_id = Doc::latest()->first()->id;

        return new Student([
           'frmno'     => $row[0],
           'N1'    => $row[1], 
           'N2'     => $row[2],
           'N3'    => $row[3], 
           'N4'     => $row[4],
           'SCHS'     => $row[5],
           'N_FACS'  => $row[6], 
           'ENTS' => $row[7],
           'admissiontype_id'    => $row[8], 
           'degree_id'    => $row[9], 
           'faculty'    => $row[10],
           'dept_name'    => $row[11],
           'dept_id' => $row[12],
           'faculty_id' => $row[13],
           'doc_id'    => $doc_id, 
        ]);
        
    }


}
