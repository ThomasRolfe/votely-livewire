<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubmissionSchema>
 */
class SubmissionSchemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function name()
    {
        return $this->state(function ($attributes) {
            return [
                'field_type_id' => 1,
                'label' => 'Sandbox name',
                'required' => true,
                'visible_to_voters' => true,
            ];
        });
    }

    public function description()
    {
        return $this->state(function ($attributes) {
            return [
                'field_type_id' => 5,
                'label' => 'Description',
                'required' => true,
                'visible_to_voters' => true,
            ];
        });
    }

    public function email()
    {
        return $this->state(function ($attributes) {
            return [
                'field_type_id' => 3,
                'label' => 'Email address',
                'required' => true,
                'visible_to_voters' => false,
            ];
        });
    }

    public function image()
    {
        return $this->state(function ($attributes) {
            return [
                'field_type_id' => 7,
                'label' => 'Image',
                'required' => true,
                'show_in_preview' => true,
                'visible_to_voters' => true,
            ];
        });
    }
}
