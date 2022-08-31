<?php

namespace App\Models;

use App\Models\Enums\DepartmentsEnum;
use App\Models\Enums\EmployersEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = DepartmentsEnum::table_departments_name_table;
    protected $primaryKey = DepartmentsEnum::table_departments_id;

    protected $fillable = [
        DepartmentsEnum::table_departments_name,
    ];

    public function employers(){
        return $this->belongsToMany(Employer::class, 'departments_employers', DepartmentsEnum::table_departments_id, EmployersEnum::table_employers_id);
    }

    public function getEmployersCountAttribute(){
        return $this->employers->count();
    }

    public function getEmployersMaxSalaryAttribute(){
        $employers = $this->employers;
        if (!empty($employers)){
            return $employers->max('salary') ?? 0;
        }
        return 0;
    }
}
