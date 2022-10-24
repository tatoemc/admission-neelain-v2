<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'طباعة',
            'بحث',

            'عرض ملف',
            'اضافة ملف',
            'حذف ملف',
            'استيراد ملف',

            'عرض مستخدم',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
    
            'عرض طالب', 
            'اضافة طالب',
            'تعديل طالب',
            'حذف طالب',
    
            'عرض كلية',
            'اضافة كلية',
            'تعديل كلية',
            'حذف كلية',

            'عرض قسم',
            'اضافة قسم',
            'تعديل قسم',
            'حذف قسم',

            'عرض القبول',
            'اضافة القبول',
            'تعديل القبول',
            'حذف القبول',

            'عرض برنامج',
            'اضافة برنامج',
            'تعديل برنامج',
            'حذف برنامج',
    
    ];
    
    
    
    foreach ($permissions as $permission) {
    
    Permission::create(['name' => $permission]);
    }
    }





}
