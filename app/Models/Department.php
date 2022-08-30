<?php

namespace App\Models;

use App\Models\Enums\DepartmentsEnum;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = DepartmentsEnum::table_departments_name_table;
    protected $primaryKey = DepartmentsEnum::table_departments_id;

    protected $fillable = [
        DepartmentsEnum::table_departments_name,
    ];

    public function employers(){
        return $this->belongsToMany(Employer::class, 'departments_employers', )
    }
}
