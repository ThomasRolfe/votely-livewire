<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class TextInputSchemaForm extends BaseSchemaForm
{
    public FieldType $field_type = FieldType::TextInput;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.text-input-schema-form');
    }
}
