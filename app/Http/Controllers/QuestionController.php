<?php

namespace App\Http\Controllers;

use App\Actions\Questions\CreateQuestion;
use App\Actions\Questions\SetQuestionOrder;
use App\Http\Requests\ShowQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Contest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class QuestionController extends Controller
{
    public function index(Contest $contest)
    {
        return view('questions')->with(['questions' => $contest->questions]);
    }

    public function store(StoreQuestionRequest $request, Contest $contest)
    {
        $question = CreateQuestion::run($request->validated());

        return QuestionResource::make($question);
    }

    public function show(ShowQuestionRequest $request, Contest $contest, Question $question)
    {
        return QuestionResource::make($question);
    }

    public function setOrder(Request $request)
    {
        /** @var array $questions */
        $questions = $request->get('questions');

        foreach ($questions as $question) {
            SetQuestionOrder::run(Question::find($question['id']), $question['order']);
        }

        return response()->json([], ResponseAlias::HTTP_CREATED);
    }

    public function edit()
    {
        return 'test';
    }
}
