<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        ];
    }

    public function coverImage()
    {
        return $this->state(function ($attributes) {
            return [
                'uuid' => Str::uuid(),
                'path' => 'cover_images/ITZFS0Sj5E8Dxq9kPM6mmK1SR26wOZJFKtFUukc1.jpg',
                'width' => '680',
                'height' => '383',
                'file_type' => 'jpg',
                'file_size_bytes' => 55022,
            ];
        });
    }

//
}
