<?php

namespace App\Http\Livewire\App\Contests;

use App\Models\Contest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    /** @var Collection<Contest> */
    public Collection $contests;

    public array $breadcrumbs;

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize('viewany', Contest::class);

        $this->contests = request()->user()->contests;

        $this->breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.contests.index');
    }
}
