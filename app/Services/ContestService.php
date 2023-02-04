<?php

namespace App\Services;

use App\Models\Contest;
use App\Models\Question;

class ContestService
{
    public function make(array $data): Contest
    {
        return new Contest($data);
    }

}
