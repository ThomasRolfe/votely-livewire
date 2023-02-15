<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\DataCollection;

class SubmissionSchemaData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public string $field_type_id,
        public string $label,
        public ?bool $required,
        /** @var SubmissionSchemaMetaData[] */
        public ?DataCollection $meta,
        public ?int $order,
        public ?array $options,
        public ?bool $show_in_preview,
        public ?bool $visible_to_voters
    ){

    }
}
