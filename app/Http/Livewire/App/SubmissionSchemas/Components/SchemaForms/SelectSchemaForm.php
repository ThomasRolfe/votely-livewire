<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\DataTransferObjects\SubmissionSchemas\SubmissionSchemaOptionData;
use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class SelectSchemaForm extends BaseSchemaForm
{
    /** @var SubmissionSchemaOptionData[] */
    public array $options = [];

    public FieldType $field_type = FieldType::Dropdown;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.schema-forms.select-schema-form');
    }

    public function addOption(): void
    {
        $this->options[] = new SubmissionSchemaOptionData(value: '');
    }
}
