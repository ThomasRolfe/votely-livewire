<?php

namespace App\Http\Livewire\App\Contests;

use Livewire\Component;

class Create extends Component
{
    public array $breadcrumbs;

    public function mount()
    {
        $this->breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
            ],
            [
                'name' => 'Create',
                'href' => route('contests.create'),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.contests.create')->layout('layouts.app');
    }
}
