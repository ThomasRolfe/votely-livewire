<?php

namespace App\DataTransferObjects\Tags;

class TagData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public string $label,
        public string $color
    ) {

    }
}
