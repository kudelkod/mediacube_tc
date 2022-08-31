<?php

namespace App\Modules\Departments\Services;

interface DepartmentsServiceInterface
{
    public function fetchDepartments();

    public function fetchDepartment($departmentId);

    public function saveDepartment($department);

    public function deleteDepartment($departmentId);

}
