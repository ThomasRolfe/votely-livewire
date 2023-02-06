<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FileResource extends JsonResource
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
            'path' => Storage::temporaryUrl($this->path, now()->addMinutes(30)),
            'download' => '/file/'.urlencode($this->uuid).'/download',
            'width' => $this->width,
            'height' => $this->height,
            'file_type' => $this->file_type,
            'file_size_bytes' => $this->file_size_bytes,
        ];
    }
}
