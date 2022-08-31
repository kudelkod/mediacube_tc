<?php

namespace App\Modules\Employers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployersResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'employer_id' => $this->employer_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'sex' => $this->sex,
            'salary' => $this->salary,
            'employer_departments' => $this->employer_departments,
        ];
    }
}
