<?php

namespace App\Contracts;

use App\Models\File;
use Illuminate\Http\UploadedFile;

interface StoresFiles
{
    public function create(UploadedFile $file, string $directory): File;
}
