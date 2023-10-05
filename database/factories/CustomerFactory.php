<?php

namespace Database\Factories;

use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullname' => fake()->firstName(),
            'type' => fake()->randomElement(CustomerType::values()),
            'phone' => fake()->numerify('#### ### ## ##'),
            'address' => fake()->streetAddress(),
        ];
    }
}
