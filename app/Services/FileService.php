<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileService
{
    public function create(UploadedFile $submittedFile, string $directory): File
    {
        $dimensions = null;

        if ($this->isImageFile($submittedFile)) {
            $dimensions = getimagesize($submittedFile);
        }

        return new File([
            'uuid' => Str::uuid(),
            'path' => $submittedFile->store($directory),
            'width' => $dimensions[0] ?? null,
            'height' => $dimensions[1] ?? null,
            'file_size_bytes' => $submittedFile->getSize(),
            'file_type' => $submittedFile->extension(),
        ]);
    }

    private function isImageFile(UploadedFile $submittedFile): bool
    {
        return in_array($submittedFile->getMimeType(), File::IMAGE_MIME_TYPES);
    }
}
