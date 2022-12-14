<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Doc;
use App\Models\Faculty;
use App\Models\Dept;
use App\Models\Degree;
use App\Models\Admissiontype; 
use App\Models\Gender; 

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function doc()
    {
        return $this->belongsTo(Doc::class);
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    public function dept()
    {
        return $this->belongsTo(Dept::class);
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }
    public function admissiontype()
    {
        return $this->belongsTo(Admissiontype::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }


    
}
