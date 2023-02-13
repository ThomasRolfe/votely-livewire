<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components;

use Livewire\Component;

class TextInputSchemaForm extends Component
{
    public string $label;
    public string $field_type;
    public bool $field_required;
    public bool $visible_to_voters;

    public function render()
    {
        return view('livewire.app.submission-schemas.components.text-input-schema-form');
    }
}
