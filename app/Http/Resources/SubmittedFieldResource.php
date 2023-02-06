<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubmittedFieldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
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
