<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubmissionSchemaMeta>
 */
class SubmissionSchemaMetaFactory extends Factory
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

    public function maximumCharacters(int $characters = 500)
    {
        return $this->state(function ($attributes) {
            return [
                'key' => 'maximumCharacters',
                'value' => 500,
            ];
        });
    }

    public function imageFile()
    {
        return $this->state(function ($attributes) {
            return [
                'key' => 'file_type',
                'value' => 'image'
            ];
        });
    }
}
