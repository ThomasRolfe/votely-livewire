<?php

namespace App\Services;

use App\Models\Contest;

class ContestService
{
    public function make(array $data): Contest
    {
        return new Contest($data);
    }
}
