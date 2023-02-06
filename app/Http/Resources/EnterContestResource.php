<?php

namespace App\Http\Resources;

class EnterContestResource extends ContestResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        unset($data['id']);

        return $data;
    }
}
