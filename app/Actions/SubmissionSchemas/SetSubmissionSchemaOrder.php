<?php

namespace App\Actions\SubmissionSchemas;

use App\Models\SubmissionSchema;
use Lorisleiva\Actions\Concerns\AsAction;

class SetSubmissionSchemaOrder
{
    use AsAction;

    public function handle(array $schemas)
    {
        foreach ($schemas as $schema) {
            SubmissionSchema::find($schema['id'])->update([
                'order' => $schema['order'],
            ]);
        }
    }
}
