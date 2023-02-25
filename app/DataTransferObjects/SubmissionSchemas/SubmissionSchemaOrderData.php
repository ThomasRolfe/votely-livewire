<?php

namespace App\DataTransferObjects\SubmissionSchemas;

class SubmissionSchemaOrderData extends \Spatie\LaravelData\Data
{
    public function __construct(public int $value, public int $order)
    {

    }
}
