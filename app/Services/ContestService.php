<?php

namespace App\Services;

use App\Models\Contest;

class ContestService
{
    public function getContestEntryPath(Contest $contest): string
    {
        return route('enter.store', ['contest' => $contest->public_key], true);
    }
}
