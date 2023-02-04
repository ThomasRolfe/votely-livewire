<?php

namespace App\Enums;

enum ContestStatuses: string
{
    case Draft = 'draft';
    case Active = 'active';
    case Archived = 'archived';
    case Completed = 'completed';
}
