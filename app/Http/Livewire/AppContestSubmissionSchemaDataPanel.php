<?php

namespace App\Http\Livewire;

use App\Models\Contest;
use Livewire\Component;

class AppContestSubmissionSchemaDataPanel extends Component
{
    public Contest $contest;

    public function render()
    {
        return view('livewire.app.contests.contest-submission-schema-data-panel');
    }
}
