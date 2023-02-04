<?php

namespace Database\Seeders;

use App\Models\Contest;
use App\Models\File;
use Illuminate\Database\Seeder;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contest::factory()
            ->has(
                File::factory()->coverImage(),
                'coverImage'
            )
            ->count(5)
            ->create();
    }
}
