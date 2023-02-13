<?php

namespace App\Actions\Contests;

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
    public function handle(User $user, array $contestData): Contest
    {
        $contest = new Contest($contestData);

        $user->contests()->save($contest);

        return $contest;
    }
}
