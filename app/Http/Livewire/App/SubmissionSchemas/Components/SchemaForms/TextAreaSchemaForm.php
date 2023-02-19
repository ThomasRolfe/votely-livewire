<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class TextAreaSchemaForm extends BaseSchemaForm
{
    public ?int $min_characters = null;
    public ?int $max_characters = null;
    public FieldType $field_type = FieldType::TextArea;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.text-area-schema-form');
    }

    protected function prepareExtraValues(): void
    {
        $this->meta = [];

        if(isset($this->min_characters)) {
            $this->meta[] = [
                'key' => 'min_characters',
                'value' => $this->min_characters,
            ];
        }

        if(isset($this->max_characters)) {
            $this->meta[] = [
                'key' => 'max_characters',
                'value' => $this->max_characters,
            ];
        }
    }
}
