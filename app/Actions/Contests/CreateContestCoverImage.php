<?php

namespace App\Actions\Contests;

use App\Contracts\StoresFiles;
use App\Models\Contest;
use App\Models\File;
use Illuminate\Http\UploadedFile;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateContestCoverImage
{
    use AsAction;

    public function __construct(protected StoresFiles $fileService)
    {
    }

    public function handle(Contest $contest, UploadedFile $file): Contest
    {
        $directory = FILE::COVER_IMAGE_DIRECTORY;

        $image = $this->fileService->create(
            $file,
            $directory
        );

        $contest->coverImage()->save($image);

        return $contest->fresh();
    }
}
