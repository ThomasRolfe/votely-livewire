<?php

namespace App\Services;

use App\Models\Answer;

class AnswerService
{
    public function make(array $attributes): Answer
    {
        return new Answer($attributes);
    }
}
