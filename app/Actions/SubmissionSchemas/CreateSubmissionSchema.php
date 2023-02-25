<?php

namespace App\Actions\SubmissionSchemas;

use App\DataTransferObjects\SubmissionSchemas\SubmissionSchemaData;
use App\Models\Contest;
use App\Models\SubmissionSchema;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateSubmissionSchema
{
    use AsAction;

    public function handle(SubmissionSchemaData $submissionSchemaData, Contest $contest): SubmissionSchema
    {
        $submissionSchema = new SubmissionSchema($submissionSchemaData->toArray());

        $contest->submissionSchemas()->save($submissionSchema);

        if (isset($submissionSchemaData->options)) {
            $submissionSchema->options()->createMany($submissionSchemaData->options);
        }

        if (isset($submissionSchemaData->meta)) {
            $submissionSchema->meta()->createMany($submissionSchemaData->meta->toArray());
        }

        return $submissionSchema;
    }
}
