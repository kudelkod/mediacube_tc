<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employer;
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
        Employer::factory(20)->create();
        Department::factory(10)->create();

        $this->call(EmployersDepartmentsTableSeeder::class);
    }
}
