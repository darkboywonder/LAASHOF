<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nominee>
 */
class NomineeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthday' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female', 'x']),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->streetAddress(),
            'zip' => $this->faker->postcode(),
            'category' => $this->faker->randomElement(['athlete', 'contributor', 'official', 'Coach']),
            'deceased' => $this->faker->boolean(),
            'accomplishment_summary' => $this->faker->sentences(5, true),
        ];
    }
}
