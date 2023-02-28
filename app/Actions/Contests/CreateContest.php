<?php

namespace App\Actions\Contests;

use App\DataTransferObjects\Contests\ContestData;
use App\Models\Contest;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateContest
{
    use AsAction;

    /**
     * @param  User  $user
     * @param  array<string, string>  $contestData
     * @return Contest
     */
    public function handle(User $user, ContestData $contestData): Contest
    {
        $contest = new Contest($contestData->toArray());

        $user->contests()->save($contest);

        return $contest;
    }
}
