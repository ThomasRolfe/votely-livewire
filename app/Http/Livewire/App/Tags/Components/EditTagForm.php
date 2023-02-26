<?php

namespace App\Http\Livewire\App\Tags\Components;

use App\Actions\Tags\UpdateTag;
use App\DataTransferObjects\Tags\TagData;
use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EditTagForm extends Component
{
    use AuthorizesRequests;

    public Tag $tag;
    public string $label;
    public string $color;

    public function mount()
    {
        $this->label = $this->tag->label;
        $this->color = $this->tag->color;
    }

    protected function messages(): array
    {
        return (new StoreTagRequest)->messages();
    }

    protected function rules(): array
    {
        return (new StoreTagRequest)->rules();
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function render()
    {
        return view('livewire.app.tags.components.edit-tag-form');
    }

    public function submit()
    {
        $this->authorize('update', $this->tag);
        $validated = $this->validate();

        UpdateTag::run($this->tag, TagData::from($validated));

        return redirect()->route('tags.index');
    }

    public function cancel()
    {
        return redirect()->route('tags.index');
    }
}
