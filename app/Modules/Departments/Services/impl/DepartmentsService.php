<?php

namespace App\Modules\Departments\Services\impl;

use App\Modules\Departments\Repositories\DepartmentsRepositoryInterface;
use App\Modules\Departments\Resources\DepartmentsCollection;
use App\Modules\Departments\Resources\DepartmentsResource;
use App\Modules\Departments\Services\DepartmentsServiceInterface;

class DepartmentsService implements DepartmentsServiceInterface
{
    private DepartmentsRepositoryInterface $departmentsRepository;

    public function __construct(DepartmentsRepositoryInterface $departmentsRepository){
        $this->departmentsRepository = $departmentsRepository;
    }

    public function fetchDepartments()
    {
        $departments = $this->departmentsRepository->fetchDepartments();

        return DepartmentsResource::collection($departments);
    }
}
