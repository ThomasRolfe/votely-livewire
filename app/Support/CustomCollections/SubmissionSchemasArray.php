<?php

namespace App\Support\CustomCollections;

use App\Models\SubmissionSchema;

class SubmissionSchemasArray extends ClassArray
{
    /**
     * {@inheritDoc}
     */
    protected function className(): string
    {
        return SubmissionSchema::class;
    }
}
