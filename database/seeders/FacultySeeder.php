<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->delete();
        $facultys = [
           
            ['name' => 'علوم الحاسوب وتقانة المعلومات'],
            ['name' => 'الاداب'],
            ['name' => 'القانون'],
            ['name' => 'الصيدلة'],
            ['name' => 'الطب والعلوم الصحية'],
            ['name' => 'الهندسة'],
            ['name' => 'علوم البصريات'],
            ['name' => 'التربية'],
            ['name' => 'علوم المختبرات الطبية'],
            ['name' => 'التجارة'],
            ['name' => 'العلوم والتقانة'],
            ['name' => 'تقانة العلوم الرياضية والإحصاء'],
            ['name' => 'التقانة الزراعية وعلوم الاسماك'],
            ['name' => 'النفط و المعادن'],
            ['name' => 'الدرسات العليا'],
            ['name' => 'طب الاسنان'],
            ['name' => 'الدراسات الاقتصادية والاجتماعية'],
            ['name' => 'علوم التمريض'],
            ['name' => 'العلاج الطبيعي'],
            ['name' => 'تنمية المجتمع'],
            ['name' => 'معهد الابحاث الطبية'],
            ['name' => 'الفنون الجميلة و التصميم'],
            ['name' => 'الدراسات الإسلامية'],
            ['name' => 'مركز الخلايا الجزعية'],
          
          
            ];
    
            foreach ($facultys as $key => $value) {
    
                Faculty::create($value);
    
            }


    }








}
