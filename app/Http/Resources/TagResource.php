<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    public static $wrap = null;

    /** @mixin Tag */
    public function toArray($request)
    {
        return [
            'label' => $this->label,
            'color' => $this->color,
        ];
    }
}
