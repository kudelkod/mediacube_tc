<?php

namespace App\Modules\Employers\Repositories\impl;

use App\Models\Employer;
use App\Modules\Employers\Repositories\EmployersRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EmployersRepository implements EmployersRepositoryInterface
{
    private Employer $employer;

    public function __construct(Employer $employer)
    {
        $this->employer = $employer;
    }

    public function fetchEmployers()
    {
        return $this->employer->get();
    }

    public function fetchEmployer($employerId)
    {
        return $this->employer->find($employerId);
    }

    public function saveEmployer($employer)
    {
        return DB::transaction(function () use ($employer){
            $departments = $employer['employer_departments'];

            $employer = $this->employer->updateOrCreate(
                ['employer_id' => $employer['employerId'] ?? 0],
                [
                    "name" => $employer['name'],
                    "surname" => $employer['surname'],
                    "patronymic" => $employer['patronymic'] ?? null,
                    "sex" => $employer['sex'] ?? null,
                    "salary" => $employer['salary'] ?? null,
                ]
            );

            foreach ($departments as $key => $value){
                $departments[] = ['department_id'=>$value, 'employer_id' => $employer->employer_id];
                unset($departments[$key]);
            }

            DB::table('departments_employers')->insert($departments);

            return $employer->employer_id;
        });
    }

    public function deleteEmployer($employerId)
    {
        return DB::transaction(function () use ($employerId){
            DB::table('departments_employers')->where('employer_id', $employerId)->delete();
            return $this->employer->destroy($employerId);
        });

    }
}
