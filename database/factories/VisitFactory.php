<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */


class VisitFactory extends Factory
{
    protected $model = \App\Models\Visit::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'company_id' => \App\Models\Company::factory(),
            'employee_id' => \App\Models\Employee::factory(),
            'visitor' => $this->faker->name(),
            'visitor_phone' => $this->faker->phoneNumber(),
            'visitor_email' => $this->faker->unique()->safeEmail(),
            'purpose' => $this->faker->sentence(),
            'arrival' => $this->faker->dateTimeThisYear(),
            'departure' => $this->faker->optional()->dateTimeThisYear(),
        ];
    }
}
