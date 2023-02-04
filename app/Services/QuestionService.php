<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    public function make(array $attributes): Question
    {
        return new Question($attributes);
    }
}
