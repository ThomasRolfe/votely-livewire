<?php

namespace App\Http\Livewire\App\Questions\Components;

use App\Actions\Questions\SetQuestionOrder;
use App\DataTransferObjects\Questions\QuestionOrderData;
use Illuminate\Support\Collection;
use Livewire\Component;

class QuestionsIndexPanel extends Component
{
    public Collection $questions;

    public function setQuestionsOrder(array $items): void
    {
        $questions = SetQuestionOrder::run(
            QuestionOrderData::collection($items)
        );

        $this->hydrateQuestions($questions);
    }

    public function hydrateQuestions($questions)
    {
        $this->questions = $questions;
    }

    public function render()
    {
        return view('livewire.app.questions.components.questions-index-panel');
    }
}
