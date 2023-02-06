<?php

namespace App\Http\Resources;

use App\Models\Answer;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /** @mixin Answer */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
