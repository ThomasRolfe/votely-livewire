<?php

namespace App\DataTransferObjects\SubmissionSchemas;

class SubmissionSchemaOptionData extends \Spatie\LaravelData\Data
{
    public function __construct(public string $value)
    {

    }
}
