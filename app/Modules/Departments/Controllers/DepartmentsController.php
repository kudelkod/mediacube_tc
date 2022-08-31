<?php

namespace App\Modules\Departments\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Departments\Requests\DepartmentRequest;
use App\Modules\Departments\Services\DepartmentsServiceInterface;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    private DepartmentsServiceInterface $departmentService;

    public function __construct(DepartmentsServiceInterface $departmentService){
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        return view('departments::welcome');
    }

    public function fetchDepartments()
    {
        $data = $this->departmentService->fetchDepartments();

        return response()->json($data, 200);
    }

    public function fetchDepartment(Request $request){
        $departmentId = $request->departmentId;

        $data = $this->departmentService->fetchDepartment($departmentId);

        return response()->json($data, 200);
    }

    public function saveDepartment(DepartmentRequest $departmentRequest){

        $departmentName = $departmentRequest->department_name;
        $departmentId = $departmentRequest->department_id;
        $department = ['department_id'=> $departmentId, 'department_name' => $departmentName];

        $departmentId = $this->departmentService->saveDepartment($department);

        return response()->json($departmentId, 200);
    }

    public function deleteDepartment(Request $request){
        $departmentId = $request->departmentId;

        $data = $this->departmentService->deleteDepartment($departmentId);
        if ($data === false){
            return response("Невозможно удалить отдел т.к. в нем присутствуют сотрудники", 500);
        }
        return response()->json($data, 200);
    }
}
