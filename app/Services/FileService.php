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
            $dimensions = getimagesize($submittedFile->path());
        }

        $path = $this->storeFile($submittedFile, $directory);

        return new File([
            'uuid' => Str::uuid(),
            'path' => $path,
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

    private function storeFile(UploadedFile $submittedFile, string $directory): string
    {
        $options = ['disk' => config('filesystems.default')];

        if (config('filesystems.default') === 'local') {
            $options['visibility'] = 'public';
        }

        return $submittedFile->store($directory, $options);
    }
}
