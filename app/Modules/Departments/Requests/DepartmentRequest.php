<?php

namespace App\Modules\Departments\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'department_name' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'required' => ':attribute является обязательным',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'department_name' => 'Наименование отдела'
        ];
    }
}
