<?php

namespace App\Http\Resources;

use App\Models\SubmittedField;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmittedFieldResource extends JsonResource
{
    /** @mixin SubmittedField */
    public function toArray($request)
    {
        return [
            'schema' => $this->submission_schema_id,
            'label' => $this->submission_schema_label,
            'value' => $this->value,
            'show_in_preview' => $this->submissionSchema->show_in_preview,
            'submission_schema' => SubmissionSchemaResource::make($this->submissionSchema),
            'file' => $this->when(
                $this->file,
                FileResource::make($this->file)
            ),
        ];
    }
}
