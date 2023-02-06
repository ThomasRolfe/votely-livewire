<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'label' => fake()->word(),
            'color' => fake()->hexColor(),
        ];
    }

    public function shortlisted()
    {
        return $this->state(function ($attributes) {
            return [
                'label' => 'shortlisted',
                'color' => '#249bb3',
            ];
        });
    }

    public function approved()
    {
        return $this->state(function ($attributes) {
            return [
                'label' => 'approved',
                'color' => '#1fad4f',
            ];
        });
    }

    public function favourite()
    {
        return $this->state(function ($attributes) {
            return [
                'label' => 'favourite',
                'color' => '#bda915',
            ];
        });
    }

    public function rejected()
    {
        return $this->state(function ($attributes) {
            return [
                'label' => 'rejected',
                'color' => '#821f1a',
            ];
        });
    }
}
