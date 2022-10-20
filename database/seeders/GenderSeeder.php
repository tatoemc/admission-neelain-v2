<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gender')->delete();
        $genders = [
           
            ['name' => 'ذكر'], 
            ['name' => 'انثى'],
          
            ];
    
            foreach ($genders as $key => $value) {
    
                Gender::create($value);
    
            }
    }




}
