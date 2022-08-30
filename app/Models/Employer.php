<?php

namespace App\Models;

use App\Models\Enums\EmployersEnum;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = EmployersEnum::table_employers_name_table;
    protected $primaryKey = EmployersEnum::table_employers_id;

    protected $fillable = [
        EmployersEnum::table_employers_name,
        EmployersEnum::table_employers_sex,
        EmployersEnum::table_employers_salary,
        EmployersEnum::table_employers_patronymic,
        EmployersEnum::table_employers_surname,
    ];
}
