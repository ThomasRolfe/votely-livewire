<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class UrlInputSchemaForm extends BaseSchemaForm
{
    public FieldType $field_type = FieldType::UrlInput;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.url-input-schema-form');
    }
}
