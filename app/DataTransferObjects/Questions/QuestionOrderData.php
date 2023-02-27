<?php

namespace App\DataTransferObjects\Questions;

class QuestionOrderData extends \Spatie\LaravelData\Data
{
    public function __construct(public int $value, public int $order)
    {

    }
}
