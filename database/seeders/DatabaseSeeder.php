<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FieldTypeSeeder::class);
        $this->call(ContestSeeder::class);
        $this->call(SubmissionSchemaSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
