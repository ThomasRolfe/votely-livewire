<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public const SUBMITTED_FIELD_FILE_DIRECTORY = 'submitted_fields';

    public const COVER_IMAGE_DIRECTORY = 'cover_images';

    public const IMAGE_MIME_TYPES = [
        'image/jpeg',
        'image/png',
        'image/gif',
    ];

    public const VIDEO_MIME_TYPES = [
        'video/mp4',
    ];

    public const GLTF_MIME_TYPES = [
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
