<?php

namespace App\Modules\Employers\Services\impl;

use App\Modules\Employers\Resources\EmployersResource;
use App\Modules\Employers\Repositories\EmployersRepositoryInterface;
use App\Modules\Employers\Services\EmployersServiceInterface;

class EmployersService implements EmployersServiceInterface
{
    private EmployersRepositoryInterface $employersRepository;

    public function __construct(EmployersRepositoryInterface $employersRepository)
    {
        $this->employersRepository = $employersRepository;
    }

    public function fetchEmployers()
    {
        $employers = $this->employersRepository->fetchEmployers();

        return EmployersResource::collection($employers);
    }

    public function fetchEmployer($employerId)
    {
        $employer = $this->employersRepository->fetchEmployer($employerId);
        $employer =  EmployersResource::make($employer);

        $employer_departments = $employer->employer_departments->pluck('department_id');

        $employer->employer_departments = $employer_departments;

        return $employer;
    }

    public function saveEmployer($employer)
    {
        return $this->employersRepository->saveEmployer($employer);
    }

    public function deleteEmployer($employerId)
    {
        return $this->employersRepository->deleteEmployer($employerId);
    }
}
