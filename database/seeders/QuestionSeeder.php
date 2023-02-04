<?php

namespace Database\Seeders;

use App\Models\Contest;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contests = Contest::all();

        foreach ($contests as $contest) {
            $questions = Question::factory()->count(5)->make();
            $contest->questions()->saveMany($questions);
        }
    }
}
