<?php

namespace App\Http\Livewire;

use App\Actions\Contests\RegenerateContestPublicKey;
use App\Http\Resources\FileResource;
use App\Models\Contest;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AppContestInformationPanel extends Component
{
    public Contest $contest;

    public function regeneratePublicKey(): void
    {
        $contest = RegenerateContestPublicKey::run($this->contest);
        $this->contest = $contest;
    }

    public function getCoverImagePathProperty()
    {
        if ($this->contest->coverImage) {
            return Storage::temporaryUrl($this->contest->coverImage->path, now()->addMinutes(30));
        }

        return null;
    }

    public function render()
    {
        return view('livewire.app.contests.contest-information-panel');
    }
}
