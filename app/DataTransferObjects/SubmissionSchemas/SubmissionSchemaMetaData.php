<?php

namespace App\DataTransferObjects\SubmissionSchemas;

use Spatie\LaravelData\Data;

class SubmissionSchemaMetaData extends Data
{
    public function __construct(
        public string $key,
        public string $value
    ) {
    }
}
