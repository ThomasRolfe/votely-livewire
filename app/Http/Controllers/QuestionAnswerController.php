<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionAnswerRequest;
use App\Http\Resources\QuestionAnswerResource;
use App\Models\Answer;
use App\Models\Question;
use App\Services\AnswerService;
use App\Services\ContestService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionAnswerController extends Controller
{
    public function __construct(protected AnswerService $answerService, protected ContestService $contestService)
    {
    }

    public function store(StoreQuestionAnswerRequest $request, Question $question)
    {
        $answer = $question->answers()->save(
            $this->answerService->make($request->validated())
        );

        return QuestionAnswerResource::make($answer);
    }

    public function setOrder(Request $request)
    {
        $answers = $request->answers;

        foreach ($answers as $answer) {
            Answer::find($answer['id'])->update([
                'order' => $answer['order'],
            ]);
        }

        return response()->json([], Response::HTTP_CREATED);
    }
}
