<?php

namespace App\Http\Resources;

use App\Models\FieldType;
use Illuminate\Http\Resources\Json\JsonResource;

class FieldTypeResource extends JsonResource
{
    /** @mixin FieldType */
    public function toArray($request)
    {
        return [
            'element' => $this->element,
            'nice_name' => $this->nice_name,
        ];
    }
}
