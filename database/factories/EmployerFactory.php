<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition()
    {
        $sex = rand(0, 1);
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'patronymic' => $this->faker->monthName,
            'sex' =>  $sex === 1 ? 'male' : 'female',
            'salary' => rand(100, 10000),
        ];
    }
}
