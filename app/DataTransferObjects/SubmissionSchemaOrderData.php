<?php

namespace App\DataTransferObjects;

class SubmissionSchemaOrderData extends \Spatie\LaravelData\Data
{
    public function __construct(public int $value, public int $order)
    {

    }
}
