<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admissiontype;
use Illuminate\Support\Facades\DB;

class AdmissiontypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admissiontypes')->delete();
        
        $admissiontypes = [
            ['name' => 'عام'],
            ['name' => 'خاص'],
            ['name' => 'وافدين'],
            ['name' => 'انتساب'],
            ['name' => 'ناضجين'],
            ['name' => 'مباشر'],
            ['name' => 'الولايات الأقل منوا'],
            ['name' => 'موازي'],
            ['name' => 'خاص ابناء درافور'],
            ['name' => 'خاص ابناء عاملين'],
            ['name' => 'دبابين'],
            ['name' => 'ترفيعات و تجسير'],
            ['name' => 'وافدين - منحة دراسية'],
            ['name' => 'وافدين- انتساب'],
            ['name' => 'وافدين-استثناء'],
            ['name' => 'ليبيا و اليمن'],
            ['name' => 'وافدين-أخرى'],
            ['name' => 'حملة درجات علمية'],
            ['name' => 'وافدين تجسير'],
            ['name' => 'نظامي بدون'],
            ['name' => 'بعد السنة الاولى نظامي'],
            ['name' => 'تحويل -خاص'],
            ['name' => 'تعليم عن بعد'],
            ['name' => 'ثاني'],
            ['name' => 'عائدين نظامي بدون'],
            ['name' => 'قبول بعد السنة الاولى'],
            ['name' => 'وافدين عن بعد'],
            ['name' => 'وافدين عن بعد بدون'],
            ['name' => 'وافدين نظامي بدون'],
            ['name' => 'بعد السنة الاولى نظامي بدون'],
            ['name' => 'تحويل وافدين'],
            ['name' => 'تجسير انتساب بدون'],
            ['name' => 'تعليم مفتوح'],
            ['name' => 'حتى العام89'],
            ['name' => 'انتساب بدون'],
            
            ];
    
            foreach ($admissiontypes as $key => $value) {
    
                Admissiontype::create($value);
    
            }
    }









}
