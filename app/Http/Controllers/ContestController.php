<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowContestRequest;
use App\Http\Requests\StoreContestRequest;
use App\Http\Requests\UpdateContestRequest;
use App\Models\Contest;
use App\Models\File;
use App\Services\ContestService;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    public function __construct(
        protected ContestService $contestService,
        protected FileService $fileService
    ) {
    }

    public function index()
    {
        $contests = Auth::user()->contests;

        return view('contests');
    }

    public function store(StoreContestRequest $request)
    {
        $contest = $this->contestService->make(
            $request->safe()->except('cover_image')
        );

        Auth::user()->contests()->save($contest);

        $contest->fresh();

        if ($request->has('cover_image')) {
            $image = $this->fileService->create(
                $request->file('cover_image'),
                FILE::COVER_IMAGE_DIRECTORY
            );

            $contest->coverImage()->save($image);
        }

        return ContestResource::make($contest);
    }

    public function show(ShowContestRequest $request, Contest $contest)
    {
        return ContestResource::make($contest);
    }

    public function update(string $contestUuid, UpdateContestRequest $request)
    {
    }

    public function delete(string $contestUuid)
    {
    }
}
