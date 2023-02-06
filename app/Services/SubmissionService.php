<?php

namespace App\Services;

use App\Models\Contest;
use App\Models\Submission;

class SubmissionService
{
    public function create(Contest $contest): Submission
    {
        /** @var $submission Submission */
        $submission = $contest->submissions()->create([
            'ip_address' => request()->ip(),
        ]);

        return $submission;
    }
}
