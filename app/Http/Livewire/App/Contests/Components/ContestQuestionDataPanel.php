<?php

namespace App\Http\Livewire\App\Contests\Components;

use App\Models\Contest;
use Livewire\Component;

class ContestQuestionDataPanel extends Component
{
    public Contest $contest;

    public function render()
    {
        return view('livewire.app.contests.components.contest-question-data-panel');
    }
}
