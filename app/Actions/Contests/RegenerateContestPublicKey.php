<?php

namespace App\Actions\Contests;

use App\Models\Contest;
use App\Services\UniqueKeyGeneratorService;
use Lorisleiva\Actions\Concerns\AsAction;

class RegenerateContestPublicKey
{
    use AsAction;

    public function __construct(protected UniqueKeyGeneratorService $uniqueKeyGeneratorService)
    {
    }

    public function handle(Contest $contest): Contest
    {
        $contest->update([
            'public_key' => $this->uniqueKeyGeneratorService::generateShortKey(
                $contest::class,
                'public_key'
            )
        ]);

        return $contest;
    }

}
