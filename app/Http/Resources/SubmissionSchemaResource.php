<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionSchemaResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'field_type' => FieldTypeResource::make($this->fieldType),
            'label' => $this->label,
            'required' => $this->required,
            'order' => $this->order,
            'visible_to_voters' => $this->visible_to_voters,
            'show_in_preview' => $this->showInPreview,
            'options' => SubmissionSchemaOptionResource::collection($this->options),
            'meta' => SubmissionSchemaMetaResource::collection($this->meta),
        ];
    }
}
