<?php

namespace App\Actions\Contests;

use App\Models\Contest;
use App\Models\File;
use App\Services\FileService;
use Illuminate\Http\UploadedFile;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateContestCoverImage
{
    use AsAction;

    public function __construct(protected FileService $fileService)
    {
    }

    public function handle(Contest $contest, UploadedFile $file): Contest
    {
        $image = $this->fileService->create(
            $file,
            FILE::COVER_IMAGE_DIRECTORY
        );

        $contest->coverImage()->save($image);

        return $contest->fresh();
    }
}
