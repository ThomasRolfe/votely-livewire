<?php

namespace App\Actions\SubmissionSchemas;

use App\DataTransferObjects\SubmissionSchemaData;
use App\Models\Contest;
use App\Models\SubmissionSchema;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateSubmissionSchema
{
    use AsAction;

    public function handle(SubmissionSchemaData $submissionSchemaData, Contest $contest): SubmissionSchema
    {
        $submissionSchema = SubmissionSchema::make($submissionSchemaData->toArray());

        $contest->submissionSchemas()->save($submissionSchema);

        if (isset($submissionSchemaData->options)) {
            $submissionSchema->options()->createMany($submissionSchemaData->options);
        }

        if (isset($submissionSchemaData->meta)) {
            $submissionSchema->meta()->createMany($submissionSchemaData->meta);
        }

        return $submissionSchema;
    }
}
