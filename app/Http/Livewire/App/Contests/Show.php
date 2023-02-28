<?php

namespace App\Http\Livewire\App\Contests;

use App\Models\Contest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    public Contest $contest;
    public array $breadcrumbs;

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
                'href' => URL::current(),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.contests.show');
    }
}
