<?php

namespace App\Actions\Submissions;

use App\Models\Contest;
use App\Models\Submission;
use App\Services\SubmissionService;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreContestSubmission
{
    use AsAction;

    public function __construct(protected SubmissionService $submissionService) {}

    public function handle(Contest $contest, array $submittedFields): Submission
    {
        $submission = $this->submissionService->create($contest);

        // Separate this out once the structure is known in php land (not react land)
        // remove json_decode dependency if possible
        foreach ($submittedFields as $index => $submittedField) {
            if (! $submittedField['value']) {
                continue;
            }

            $fieldType = json_decode($submittedField['field_type']);
            $this->submittedFieldService->storeField(
                $submission,
                $submittedField,
                $fieldType,
                $index
            );
        }

        return $submission;
    }
}
