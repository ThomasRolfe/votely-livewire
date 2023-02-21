<?php

namespace App\Http\Livewire\App\Contests\Components;

use App\Actions\Contests\RegenerateContestPublicKey;
use App\Contracts\GetsFiles;
use App\Models\Contest;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class ContestInformationPanel extends Component
{
    public Contest $contest;

    // Exists in case the random string generated is not suitable
    public function regeneratePublicKey(): void
    {
        $contest = RegenerateContestPublicKey::run($this->contest);
        $this->contest = $contest;
    }

    public function getCoverImagePathProperty(): ?string
    {
        if (! $this->contest->coverImage) {
            return null;
        }

        $fileService = App::make(GetsFiles::class);

        return $fileService->getFileUrl($this->contest->coverImage->path);
    }

    public function render()
    {
        return view('livewire.app.contests.components.contest-information-panel');
    }
}
