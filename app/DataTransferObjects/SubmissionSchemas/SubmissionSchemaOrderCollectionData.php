<?php

namespace App\DataTransferObjects\SubmissionSchemas;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class SubmissionSchemaOrderCollectionData extends \Spatie\LaravelData\Data
{
    public function __construct(
        #[DataCollectionOf(SubmissionSchemaOrderData::class)]
        public ?DataCollection $orders
    ) {

    }
}
