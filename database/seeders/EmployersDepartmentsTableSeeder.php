<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployersDepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        $departments_employers = [];

        for($i = 0; $i < 20; $i++){
            $department_id = rand(1,10);
            $employer_id = rand(1,20);

            $departments_employers[] = ['department_id' => $department_id, 'employer_id' => $employer_id];
        }

        DB::table('departments_employers')->insert($departments_employers);
    }
}
