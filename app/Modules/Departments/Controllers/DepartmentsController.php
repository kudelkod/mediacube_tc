<?php

namespace App\Modules\Departments\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Departments\Services\DepartmentsServiceInterface;

class DepartmentsController extends Controller
{
    private DepartmentsServiceInterface $departmentService;

    public function __construct(DepartmentsServiceInterface $departmentService){
        $this->departmentService = $departmentService;
    }

    public function fetchDepartments()
    {
        $data = $this->departmentService->fetchDepartments();

        return response()->json($data, 200);
    }
}
