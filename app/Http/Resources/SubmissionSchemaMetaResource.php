<?php

namespace App\Http\Resources;

use App\Models\SubmissionSchemaMeta;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionSchemaMetaResource extends JsonResource
{
    /** @mixin SubmissionSchemaMeta */
    public function toArray($request)
    {
        return [
            'key' => $this->key,
            'value' => $this->value,
        ];
    }
}
