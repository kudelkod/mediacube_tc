<?php

namespace App\Modules\Departments\Repositories\impl;

use App\Models\Department;
use App\Modules\Departments\Repositories\DepartmentsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DepartmentsRepository implements DepartmentsRepositoryInterface
{
    private Department $department;

    public function __construct(
        Department $department
    )
    {
        $this->department = $department;
    }

    public function fetchDepartments()
    {
        return $this->department->get();
    }

    public function fetchDepartment($departmentId)
    {
        return $this->department->find($departmentId);
    }

    public function saveDepartment($department)
    {
        $data = $this->department->updateOrCreate(
            ['department_id' => $department['department_id'] ?? 0],
            [
                'name' => $department['department_name'],
            ]
        );

        return $data->department_id;
    }

    public function deleteDepartment($departmentId)
    {
        $count = DB::table('departments_employers')->where('department_id', $departmentId)->count();

        if ($count === 0){
            return $this->department->destroy($departmentId);
        }
        return false;
    }
}
