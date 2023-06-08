<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inquiries>
 */
class inquiriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' =>$this->faker->phoneNumber,
            'interest' => $this->faker->company,
            'source' => $this->faker->colorName,
            'message'=>$this->faker->streetName,
            'created_at'=>$this->faker->dateTimeBetween('12-01-2023','12-06-2023','Africa/Nairobi'),
            'updated_at'=>$this->faker->dateTimeBetween('12-01-2023','12-06-2023','Africa/Nairobi'),
            'logger' =>$this->faker->name
        ];
    }
}
