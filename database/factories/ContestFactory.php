<?php

namespace Database\Factories;

use App\Enums\ContestStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contest>
 */
class ContestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'public_key' => Str::random(8),
            'user_id' => 1,
            'name' => fake()->text(20),
            'description' => fake()->paragraph(),
            'status' => ContestStatuses::Draft->value,
            'submission_start_date' => fake()->date(),
        ];
    }
}
