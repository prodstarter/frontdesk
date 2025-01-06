<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class DesignationFactory extends Factory
{
    protected $model = \App\Models\Designation::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'company_id' => \App\Models\Company::factory(),
            'department_id' => \App\Models\Department::factory(),
            'name' => $this->faker->unique()->jobTitle(),
        ];
    }
}
