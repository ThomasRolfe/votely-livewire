<?php

namespace App\Services;

use App\Models\Contest;
use App\Models\Submission;

class SubmissionService
{
    public function __construct(protected SubmittedFieldService $submittedFieldService)
    {
    }

    // TODO: change submittedFields into a DTO?
    public function store(Contest $contest, array $submittedFields): Submission
    {
        $submission = $contest->submissions()->create([
            'ip_address' => request()->ip(),
        ]);

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
