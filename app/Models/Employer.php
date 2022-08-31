<?php

namespace App\Models;

use App\Models\Enums\DepartmentsEnum;
use App\Models\Enums\EmployersEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = EmployersEnum::table_employers_name_table;
    protected $primaryKey = EmployersEnum::table_employers_id;

    protected $fillable = [
        EmployersEnum::table_employers_name,
        EmployersEnum::table_employers_sex,
        EmployersEnum::table_employers_salary,
        EmployersEnum::table_employers_patronymic,
        EmployersEnum::table_employers_surname,
    ];

    public function departments(){
        return $this->belongsToMany(Department::class, 'departments_employers', EmployersEnum::table_employers_id, DepartmentsEnum::table_departments_id);
    }

    public function getEmployerDepartmentsAttribute(){
        $departments = $this->departments;

        if(!empty($departments)){
            return $departments;
        }
        return null;
    }
}
