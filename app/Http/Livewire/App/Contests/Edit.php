<?php

namespace App\Http\Livewire\App\Contests;

use App\Models\Contest;
use Livewire\Component;

class Edit extends Component
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
        ];
    }

    public function render()
    {
        return view('livewire.app.contests.edit');
    }
}
