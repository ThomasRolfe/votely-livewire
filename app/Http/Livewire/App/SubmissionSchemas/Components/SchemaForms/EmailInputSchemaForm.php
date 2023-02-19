<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class EmailInputSchemaForm extends BaseSchemaForm
{
    public FieldType $field_type = FieldType::EmailInput;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.schema-forms.email-input-schema-form');
    }
}
