<?php

namespace App\DataTransferObjects;

class SubmissionSchemaOptionData extends \Spatie\LaravelData\Data
{
    public function __construct(public string $value)
    {

    }
}
