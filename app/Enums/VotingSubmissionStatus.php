<?php

namespace App\Enums;

enum VotingSubmissionStatus: string
{
    case Draft = 'draft';
    case Complete = 'complete';
}
