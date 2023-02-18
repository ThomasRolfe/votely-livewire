<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class SubmissionSchemaOptionData extends Data
{
    public function __construct(public string $value)
    {

    }
}
