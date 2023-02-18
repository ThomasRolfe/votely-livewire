<?php

namespace App\DataTransferObjects;

use App\Enums\FieldType;
use Spatie\LaravelData\DataCollection;

class SubmissionSchemaData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public FieldType $field_type,
        public string $label,
        /** @var SubmissionSchemaMetaData[] */
        public ?DataCollection $meta,
        /** @var SubmissionSchemaOptionData[] */
        public ?DataCollection $options,
        public ?int $order = 0,
        public ?bool $required = false,
        public ?bool $show_in_preview = false,
        public ?bool $visible_to_voters = false
    ) {

    }
}
