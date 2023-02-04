<?php

namespace Database\Factories;

use App\Enums\AnswerTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
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
            'text' => fake()->sentence(),
            'answer_type' => AnswerTypes::SingleOption->value,
        ];
    }
}
