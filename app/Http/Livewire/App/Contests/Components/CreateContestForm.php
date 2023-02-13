<?php

namespace App\Http\Livewire\App\Contests\Components;

use App\Actions\Contests\CreateContest;
use App\Actions\Contests\CreateContestCoverImage;
use App\Http\Requests\StoreContestRequest;
use App\Models\Contest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateContestForm extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public string $name;
    public string $description;
    public string $submission_start_date;
    public string $submission_end_date;
    public string $vote_start_date;
    public string $vote_end_date;
    public $cover_image;

    protected function messages(): array
    {
        return (new StoreContestRequest)->messages();
    }

    protected function rules(): array
    {
        return (new StoreContestRequest)->rules();
    }

    public function render()
    {
        return view('livewire.app.contests.components.create-contest-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly(
            $propertyName
        );
    }

    public function submit()
    {
        $this->authorize('create', Contest::class);
        $validated = $this->validate();

        $contest = CreateContest::run(Auth::user(), $validated);

        if (isset($validated['cover_image'])) {
            $contest = CreateContestCoverImage::run($contest, $this->cover_image);
        }

        return redirect()->route('contests.show', ['contest' => $contest]);
    }
}
