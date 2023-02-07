<?php

namespace App\Http\Controllers;

use App\Actions\Contests\CreateContest;
use App\Actions\Contests\CreateContestCoverImage;
use App\Http\Requests\ShowContestRequest;
use App\Http\Requests\StoreContestRequest;
use App\Http\Requests\UpdateContestRequest;
use App\Http\Resources\ContestResource;
use App\Models\Contest;
use App\Services\ContestService;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    public function __construct(
        protected FileService $fileService
    ) {
    }

    public function index()
    {
        /** @var array<Contest> $contests */
        $contests = request()->user()->contests;

        return view('app.contests.index')->with(['contests' => ContestResource::collection($contests)]);
    }

    public function create()
    {
        $breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests'),
            ],
            [
                'name' => 'Create',
                'href' => route('contests.create'),
            ]
        ];
        return view('app.contests.create')->with(['breadcrumbs' => $breadcrumbs]);
    }

    public function store(StoreContestRequest $request)
    {
        $contest = CreateContest::run(
            request()->user(),
            $request->safe()->except(['cover_image'])
        );

        if ($request->has('cover_image')) {
            CreateContestCoverImage::run($contest, $request->file('cover_image'));
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
