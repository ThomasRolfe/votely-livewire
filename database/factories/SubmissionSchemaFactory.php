<?php

namespace Database\Factories;

use App\Enums\FieldType;
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
                'field_type' => FieldType::TextInput->value,
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
                'field_type' => FieldType::TextArea->value,
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
                'field_type' => FieldType::EmailInput->value,
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
                'field_type' => FieldType::FileUpload->value,
                'label' => 'Image',
                'required' => true,
                'show_in_preview' => true,
                'visible_to_voters' => true,
            ];
        });
    }
}
