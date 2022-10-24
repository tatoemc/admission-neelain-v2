<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Gender extends Model
{
    use HasFactory;
    protected $table = 'gender';
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }



}
