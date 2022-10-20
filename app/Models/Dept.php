<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Faculty;
use App\Models\Student;

class Dept extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];


    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
        //return $this->belongsTo('App\Models\Faculty', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }




}
