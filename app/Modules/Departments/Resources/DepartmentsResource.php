<?php

namespace App\Modules\Departments\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentsResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'department_id' => $this->department_id,
            'name' => $this->name,
            'max_salary' => $this->employersMaxSalary,
            'employers_count' => $this->employersCount,
            'edit' => false,
        ];
    }
}
