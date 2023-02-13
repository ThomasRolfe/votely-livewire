<?php

namespace App\Services;

use App\Models\File;
use App\Models\Submission;
use App\Models\SubmittedField;
use Illuminate\Http\UploadedFile;

class SubmittedFieldService
{
    public function __construct(protected FileService $fileService)
    {
    }

    public function storeField(
        Submission $submission,
        $submittedField,
        \stdClass $fieldType,
        int $index
    ): SubmittedField {
        if ($this->isFileField($fieldType)) {
            return $this->storeSubmittedFile(
                $submission,
                $submittedField,
                request()->file('submittedFields.' . $index . '.value')
            );
        }

        return $this->storeSubmittedField($submission, $submittedField);
    }

    private function storeSubmittedField(Submission $submission, $submittedField): SubmittedField
    {
        return $submission->submittedFields()->create([
            'submission_schema_id' => $submittedField['id'],
            'submission_schema_label' => $submittedField['label'],
            'value' => $submittedField['value'],
        ]);
    }

    private function storeSubmittedFile(
        Submission $submission,
        $submittedField,
        UploadedFile $submittedFile
    ): SubmittedField {
        $file = $this->fileService->create($submittedFile, FILE::SUBMITTED_FIELD_FILE_DIRECTORY);

        $submittedField = $submission->submittedFields()->create([
            'submission_schema_id' => $submittedField['id'],
            'submission_schema_label' => $submittedField['label'],
            'value' => $file->path,
        ]);

        $submittedField->file()->save($file);

        return $submittedField;
    }

    private function isFileField(\stdClass $fieldType): bool
    {
        return $fieldType->element === 'file';
    }
}
