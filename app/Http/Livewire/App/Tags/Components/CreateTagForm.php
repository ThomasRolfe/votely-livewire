<?php

namespace App\Http\Livewire\App\Tags\Components;

use App\Actions\Tags\CreateTag;
use App\DataTransferObjects\Tags\TagData;
use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTagForm extends Component
{
    use AuthorizesRequests;

    public string $label;
    public string $color = '#FF0000';

    protected function messages(): array
    {
        return (new StoreTagRequest)->messages();
    }

    protected function rules(): array
    {
        return (new StoreTagRequest)->rules();
    }

    public function render()
    {
        return view('livewire.app.tags.components.create-tag-form');
    }

    public function submit()
    {
        $this->authorize('create', Tag::class);
        $validated = $this->validate();

        CreateTag::run(Auth::user(), TagData::from($validated));

        return redirect()->route('tags.index');
    }
}
