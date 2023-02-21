<?php

namespace App\Services;

use App\Contracts\GetsFiles;
use App\Contracts\StoresFiles;
use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileServiceLocal implements StoresFiles, GetsFiles
{
    public function create(UploadedFile $file, string $directory): File
    {
        $directory = 'public/' . $directory;
        $dimensions = null;

        if ($this->isImageFile($file)) {
            $dimensions = getimagesize($file->path());
        }

        $path = $this->storeFile($file, $directory);

        return new File([
            'uuid' => Str::uuid(),
            'path' => $path,
            'width' => $dimensions ? $dimensions[0] : null,
            'height' => $dimensions ? $dimensions[1] : null,
            'file_size_bytes' => $file->getSize(),
            'file_type' => $file->extension(),
        ]);
    }

    private function isImageFile(UploadedFile $submittedFile): bool
    {
        return in_array($submittedFile->getMimeType(), File::IMAGE_MIME_TYPES);
    }

    private function storeFile(UploadedFile $submittedFile, string $directory): string
    {
        $options = [
            'disk' => 'local',
            'visibility' => 'public',
        ];

        return $submittedFile->store($directory, $options);
    }

    public function getFileUrl(string $path): string
    {
        return Storage::disk('local')->url($path);
    }
}
