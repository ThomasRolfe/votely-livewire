<?php

namespace App\Actions\Contests;

use App\Models\Contest;
use App\Models\User;
use App\Services\ContestService;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateContest
{
    use AsAction;

    public function __construct(protected ContestService $contestService)
    {
    }

    public function handle(User $user, array $contestData): Contest
    {
        $contest = $this->contestService->make($contestData);

        $user->contests()->save($contest);

        return $contest;
    }
}
