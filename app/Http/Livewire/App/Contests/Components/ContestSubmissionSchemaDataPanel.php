<?php

namespace App\Http\Livewire\App\Contests\Components;

use App\Models\Contest;
use Livewire\Component;

class ContestSubmissionSchemaDataPanel extends Component
{
    public Contest $contest;

    public function render()
    {
        return view('livewire.app.contests.components.contest-submission-schema-data-panel');
    }
}
