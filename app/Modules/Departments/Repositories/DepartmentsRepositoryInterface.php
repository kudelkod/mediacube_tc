<?php

namespace App\Modules\Departments\Repositories;


interface DepartmentsRepositoryInterface
{
    public function fetchDepartments();

    public function fetchDepartment($departmentId);

    public function saveDepartment($department);

    public function deleteDepartment($departmentId);
}
