<?php

namespace App\Http\Resources;

class EnterContestResource extends ContestResource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        unset($data['id']);

        return $data;
    }
}
