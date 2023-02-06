<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Contest;
use App\Models\Question;
use App\Services\ContestService;
use App\Services\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function __construct(
        protected QuestionService $questionService,
        protected ContestService $contestService
    ) {
    }

    public function index(Contest $contest): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('questions')->with(['questions' => $contest->questions]);
    }

    public function store(StoreQuestionRequest $request, Contest $contest)
    {
        $question = $contest->questions()->save(
            $this->questionService->make($request->validated())
        );

        return QuestionResource::make($question);
    }

    public function show(ShowQuestionRequest $request, Contest $contest, Question $question)
    {
        return QuestionResource::make($question);
    }

    public function setOrder(Request $request)
    {
        $questions = $request->questions;

        foreach ($questions as $question) {
            Question::find($question['id'])->update([
                'order' => $question['order'],
            ]);
        }

        return response()->json([], Response::HTTP_CREATED);
    }
}
