<?php

namespace App\Modules\Employers\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Employers\Requests\EmployerRequest;
use App\Modules\Employers\Services\EmployersServiceInterface;
use Illuminate\Http\Request;

class EmployersController extends Controller
{
    private EmployersServiceInterface $employersService;

    public function __construct(EmployersServiceInterface $employersService){
        $this->employersService = $employersService;
    }

    public function index()
    {
        return view('employers::welcome');
    }

    public function fetchEmployers(){
        $data = $this->employersService->fetchEmployers();

        return response()->json($data, 200);
    }

    public function fetchEmployer(Request $request){
        $employerId = $request->employerId;

        $data = $this->employersService->fetchEmployer($employerId);

        return response()->json($data, 200);
    }

    public function saveEmployer(EmployerRequest $employerRequest){
        $employer = $employerRequest->all();

        $data = $this->employersService->saveEmployer($employer);
        return response()->json($data, 200);
    }

    public function deleteEmployer(Request $request){
        $employerId = $request->employerId;

        return $this->employersService->deleteEmployer($employerId);
    }

}
