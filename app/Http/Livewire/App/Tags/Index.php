<?php

namespace App\Http\Livewire\App\Tags;

use App\Models\Tag;
use Livewire\Component;

class Index extends Component
{
    /** @var Tag[] tags */
    public $tags;

    public $breadcrumbs;

    public function mount()
    {
        $this->tags = request()->user()->tags;

        $this->breadcrumbs = [
            [
                'name' => 'Tags',
                'href' => route('tags.index'),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.tags.index');
    }
}
