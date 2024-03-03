<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aplication>
 */
class AplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = User::where('role_id', '=', 1)->inRandomOrder()->first()->get();
        return [
            'user_id' => $id->id,
            'subject' => $this->faker->sentence(),
            'message' => $this->faker->paragraph(),
        ];
    }
}
