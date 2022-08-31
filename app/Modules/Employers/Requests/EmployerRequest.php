<?php

namespace App\Modules\Employers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'employer_departments' => 'array|required|min:1',
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
            'min' => 'Необходимо выбрать хотя бы [:min] отдел'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'employer_departments' => 'Отделы сотрудника',
        ];
    }
}
