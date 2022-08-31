<?php

namespace App\Modules\Employers\Services;

interface EmployersServiceInterface
{
    public function fetchEmployers();

    public function fetchEmployer($employerId);

    public function saveEmployer($employer);

    public function deleteEmployer($employerId);
}
