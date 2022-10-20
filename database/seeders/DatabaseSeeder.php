<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([ 
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',  
        // ]);
        $this->call(PermissionSeeder::class);
        $this->call(AdmissiontypeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DegreeSeeder::class);
        $this->call(FacultySeeder::class);
        $this->call(DeptSeeder::class);
       
    }
}
