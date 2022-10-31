<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use Illuminate\Database\Eloquent\SoftDeletes;

class Degree extends Model
{
    use HasFactory,SoftDeletes;
    //protected $table = 'degree';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
   


    public function students()
    {
        return $this->hasMany(Student::class);
    }


}
