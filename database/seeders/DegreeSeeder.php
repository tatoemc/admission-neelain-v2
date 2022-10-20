<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Degree;
use Illuminate\Support\Facades\DB;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degrees')->delete();
        $degrees = [
           
            ['name' => 'دبلوم وسيط سنتين'],
            ['name' => 'دبلوم تقني ثلاث سنوات'],
            ['name' => 'بكالريوس'],
            ['name' => 'بكالريوس الشرف'],
            ['name' => 'دبلوم عالي'],
            ['name' => 'ماجستير'],
            ['name' => 'دكتوراه'],
            ['name' => 'تأهيلي ماجستير1'],
            ['name' => 'ماجستير بالم'],
          
            ];
    
            foreach ($degrees as $key => $value) {
    
                Degree::create($value);
    
            }
            
    }





}
