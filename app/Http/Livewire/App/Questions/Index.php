<?php

namespace App\Http\Livewire\App\Questions;

use App\Models\Contest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    public Contest $contest;
    public array $breadcrumbs;
    public array $questions;

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize('view', $this->contest);
        $this->breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
            ],
            [
                'name' => $this->contest->name,
                'href' => route('contests.show', $this->contest),
            ],
            [
                'name' => 'Voting Questions',
                'href' => URL::current(),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.questions.index');
    }
}
