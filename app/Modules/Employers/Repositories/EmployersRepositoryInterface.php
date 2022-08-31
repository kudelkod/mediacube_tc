<?php

namespace App\Modules\Employers\Repositories;

interface EmployersRepositoryInterface
{

    public function fetchEmployers();

    public function fetchEmployer($employerId);

    public function saveEmployer($employer);

    public function deleteEmployer($employerId);

}
