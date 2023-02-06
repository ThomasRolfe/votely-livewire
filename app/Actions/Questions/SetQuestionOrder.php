<?php

namespace App\Actions\Questions;

use App\Models\Question;
use Lorisleiva\Actions\Concerns\AsAction;

class SetQuestionOrder
{
    use AsAction;

    public function handle(Question $question, int $order): Question
    {
        $question->update(['order' => $order]);

        return $question;
    }
}
