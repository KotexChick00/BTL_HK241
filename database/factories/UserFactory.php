<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hasShop = fake()->boolean;   
        return [
            'login' => fake()->unique()->userName,
            'password' => 'samplepassword',
            'user_type' => false,
            'full_name' => fake()->name,
            'phone_number' => fake()->phoneNumber,
            'shop_name' => $hasShop ? fake()->company : null,
            'shop_description' => $hasShop ? fake()->realText() : null,
        ];
    }
}
