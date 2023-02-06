<?php

namespace App\Actions\Questions;

use App\Models\Contest;
use App\Models\Question;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateQuestion
{
    use AsAction;

    /**
     * @param Contest $contest
     * @param array<string, string> $questionData
     * @return Question
     */
    public function handle(Contest $contest, array $questionData): Question
    {
        $question = new Question($questionData);

        $contest->questions()->save(
            $question
        );

        return $question->fresh();
    }
}
