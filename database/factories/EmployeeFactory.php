<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class EmployeeFactory extends Factory
{
    protected $model = \App\Models\Employee::class;

    public function definition()
    {
        return [
            'company_id' => \App\Models\Company::factory(),
            'email' => $this->faker->unique()->safeEmail(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'department_id' => \App\Models\Department::factory(),
            'designation_id' => \App\Models\Designation::factory(),
        ];
    }
}
