<?php

namespace App\DataTransferObjects;

class SubmissionSchemaMetaData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public string $key,
        public string $value
    ) {
    }
}
