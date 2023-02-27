<?php

namespace App\DataTransferObjects\Questions;

class QuestionData
{
    public function __construct(
        public string $text,
        public string $answer_type,
        public ?int $order = 0
    ) {
    }
}
