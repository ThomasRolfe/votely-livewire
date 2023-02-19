<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class CheckboxSchemaForm extends BaseSchemaForm
{
    public FieldType $field_type = FieldType::Checkbox;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.schema-forms.checkbox-schema-form');
    }
}
