<?php

namespace App\Http\Resources;

use App\Models\Submission;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionResource extends JsonResource
{
    /** @mixin Submission */
    public function toArray($request)
    {
        return [
            'submitted_fields' => SubmittedFieldResource::collection($this->submittedFields),
        ];
    }
}
