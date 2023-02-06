<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContestResource extends JsonResource
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
            'id' => $this->uuid,
            'public_key' => $this->public_key,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'cover_image' => FileResource::make($this->coverImage),
            'questions' => QuestionResource::collection($this->questions),
            'submissions' => SubmissionResource::collection($this->submissions),
            'submission_count' => $this->submissions()->count(),
            'submission_start_date' => $this->submission_start_date?->toRfc7231String(),
            'submission_end_date' => $this->submission_end_date?->toRfc7231String(),
            'vote_start_date' => $this->vote_start_date?->toRfc7231String(),
            'vote_end_date' => $this->vote_end_date?->toRfc7231String(),
            'submission_schemas' => SubmissionSchemaResource::collection($this->submissionSchemas),
        ];
    }
}
