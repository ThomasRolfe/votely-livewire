<?php

namespace App\DataTransferObjects\SubmissionSchemas;

use App\Enums\FieldType;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class SubmissionSchemaData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public FieldType $field_type,
        public string $label,
        #[DataCollectionOf(SubmissionSchemaMetaData::class)]
        public ?DataCollection $meta,
        #[DataCollectionOf(SubmissionSchemaOptionData::class)]
        public ?array $options,
        public ?int $order = 0,
        public ?bool $required = false,
        public ?bool $show_in_preview = false,
        public ?bool $visible_to_voters = false
    ) {

    }
}
