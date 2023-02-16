<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\DataCollection;

class SubmissionSchemaData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public string $field_type_id,
        public string $label,
        /** @var SubmissionSchemaMetaData[] */
        public ?DataCollection $meta,
        /** @var SubmissionSchemaOptionData[] */
        public ?array $options,
        public ?int $order = 0,
        public bool $required = false,
        public ?bool $show_in_preview = false,
        public ?bool $visible_to_voters = false
    ){

    }
}
