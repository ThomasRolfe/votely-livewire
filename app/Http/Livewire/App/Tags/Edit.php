<?php

namespace App\Http\Livewire\App\Tags;

use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public Tag $tag;
    public array $breadcrumbs;

    public function mount()
    {
        $this->authorize('view', $this->tag);

        $this->breadcrumbs = [
            [
                'name' => 'Tags',
                'href' => route('tags.index'),
            ],
            [
                'name' => $this->tag->label,
                'href' => route('tags.edit', ['tag' => $this->tag]),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.tags.edit');
    }
}
