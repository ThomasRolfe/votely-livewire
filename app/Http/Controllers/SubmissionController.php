<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Resources\EnterContestResource;
use App\Http\Resources\SubmissionResource;
use App\Models\Contest;
use App\Services\SubmissionService;

class SubmissionController extends Controller
{
    public function show(Contest $contest)
    {
        return EnterContestResource::make($contest);
    }

    public function store(StoreSubmissionRequest $request, Contest $contest, SubmissionService $submissionService)
    {
        $submission = $submissionService->store($contest, $request->submittedFields);

        return SubmissionResource::make($submission);
    }
}
