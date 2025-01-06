<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */


class DepartmentFactory extends Factory
{
    protected $model = \App\Models\Department::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'company_id' => \App\Models\Company::factory(),
            'name' => $this->faker->unique()->jobTitle(),
            'description' => $this->faker->optional()->sentence(),
            'parent_id' => null,
        ];
    }
}
