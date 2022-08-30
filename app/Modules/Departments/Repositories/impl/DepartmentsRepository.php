<?php

namespace App\Modules\Departments\Repositories\impl;

use App\Models\Department;
use App\Modules\Departments\Repositories\DepartmentsRepositoryInterface;

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
        $departments = $this->department->get();

        return $departments;
    }
}
