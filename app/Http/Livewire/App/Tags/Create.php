<?php

namespace App\Http\Livewire\App\Tags;

use Livewire\Component;

class Create extends Component
{
    public $breadcrumbs;

    public function mount()
    {

        $this->breadcrumbs = [
            [
                'name' => 'Tags',
                'href' => route('tags.index'),
            ],
            [
                'name' => 'Create',
                'href' => route('tags.create'),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.tags.create');
    }
}
