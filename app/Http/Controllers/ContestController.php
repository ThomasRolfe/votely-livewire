<?php

namespace App\Http\Controllers;

use App\Actions\Contests\CreateContest;
use App\Actions\Contests\CreateContestCoverImage;
use App\Http\Requests\ShowContestRequest;
use App\Http\Requests\StoreContestRequest;
use App\Http\Requests\UpdateContestRequest;
use App\Http\Resources\ContestResource;
use App\Models\Contest;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

        $breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
            ],
        ];

        return view('app.contests.index')->with(['breadcrumbs' => $breadcrumbs, 'contests' => $contests]);
    }

    public function create()
    {
        $breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
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
        $breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
            ],
            [
                'name' => $contest->name,
                'href' => $request->path(),
            ]
        ];

        return view('app.contests.show')->with(['breadcrumbs' => $breadcrumbs, 'contest' => $contest]);
    }

    public function edit(Contest $contest)
    {

    }

    public function update(string $contestUuid, UpdateContestRequest $request)
    {
    }

    public function delete(string $contestUuid)
    {
    }
}
