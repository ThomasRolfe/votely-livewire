<?php

namespace App\Http\Livewire;

use App\Actions\Contests\RegenerateContestPublicKey;
use App\Models\Contest;
use Livewire\Component;

class AppContestInformationPanel extends Component
{
    public Contest $contest;

    public function regeneratePublicKey(): void
    {
        $contest = RegenerateContestPublicKey::run($this->contest);
        $this->contest = $contest;
    }

    public function render()
    {
        return view('livewire.app.contests.contest-information-panel');
    }
}
