<?php

namespace App\Http\Resources;

use App\Models\SubmissionSchemaOption;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionSchemaOptionResource extends JsonResource
{
    /** @mixin SubmissionSchemaOption */
    public function toArray($request)
    {
        return [
            'value' => $this->value,
        ];
    }
}
