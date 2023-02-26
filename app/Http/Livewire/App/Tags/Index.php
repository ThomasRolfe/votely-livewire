<?php

namespace App\Http\Livewire\App\Tags;

use App\Actions\Tags\DeleteTag;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions;
    use AuthorizesRequests;

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

    public function delete(Tag $tag): void
    {
        $this->authorize('delete', $tag);
        DeleteTag::run($tag);

        redirect()->route('tags.index');
    }

    public function render()
    {
        return view('livewire.app.tags.index');
    }
}
