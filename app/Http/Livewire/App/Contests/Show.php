<?php

namespace App\Http\Livewire\App\Contests;

use App\Models\Contest;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Show extends Component
{
    public Contest $contest;
    public array $breadcrumbs;

    public function mount()
    {
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
