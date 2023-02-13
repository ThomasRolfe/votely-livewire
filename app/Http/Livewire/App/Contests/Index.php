<?php

namespace App\Http\Livewire\App\Contests;

use Livewire\Component;

class Index extends Component
{
    public $contests;
    public $breadcrumbs;

    public function mount()
    {
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
