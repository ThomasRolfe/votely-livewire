<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    const SUBMITTED_FIELD_FILE_DIRECTORY = 'submitted_fields';

    const COVER_IMAGE_DIRECTORY = 'cover_images';

    const IMAGE_MIME_TYPES = [
        'image/jpeg',
        'image/png',
        'image/gif',
    ];

    const VIDEO_MIME_TYPES = [
        'video/mp4',
    ];

    const GLTF_MIME_TYPES = [
        'model/gltf+json',
    ];

    protected $fillable = [
        'uuid',
        'path',
        'width',
        'height',
        'file_size_bytes',
        'file_type',
        'fileable_id',
        'fileable_type',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }
}
