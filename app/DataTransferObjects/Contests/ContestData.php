<?php

namespace App\DataTransferObjects\Contests;

use App\Enums\ContestStatuses;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;

class ContestData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public string $name,
        public string $description,
        public ?string $submission_start_date,
        public ?string $submission_end_date,
        public ?string $vote_start_date,
        public ?string $vote_end_date,
        #[WithCast(EnumCast::class)]
        public ?ContestStatuses $status = ContestStatuses::Draft,
    ) {
    }
}
