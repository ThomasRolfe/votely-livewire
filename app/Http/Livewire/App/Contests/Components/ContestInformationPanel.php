<?php

namespace App\Http\Livewire\App\Contests\Components;

use App\Actions\Contests\RegenerateContestPublicKey;
use App\Models\Contest;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ContestInformationPanel extends Component
{
    public Contest $contest;

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

        // TODO: Create separate file fetch services & inject based on environment
        if (config('filesystems.default') === 's3') {
            return Storage::temporaryUrl($this->contest->coverImage->path, now()->addMinutes(60));
        } elseif (config('filesystems.default') === 'local') {
            return Storage::url($this->contest->coverImage->path);
        }

        return null;
    }

    public function render()
    {
        return view('livewire.app.contests.components.contest-information-panel');
    }
}
