<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::find(1)->tags()->saveMany([
            Tag::factory()->approved()->make(),
            Tag::factory()->rejected()->make(),
            Tag::factory()->favourite()->make(),
            Tag::factory()->shortlisted()->make(),
        ]);
    }
}
