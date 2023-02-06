<?php

namespace App\Http\Resources;

use App\Models\Question;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /** @mixin Question */
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'text' => $this->text,
            'order' => $this->order,
            'answer_type' => $this->answer_type,
            'answers' => AnswerResource::collection($this->answers),
        ];
    }
}
