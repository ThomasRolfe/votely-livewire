<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class NumberInputSchemaForm extends BaseSchemaForm
{
    public ?int $min_value = null;
    public ?int $max_value = null;
    public FieldType $field_type = FieldType::NumberInput;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.number-input-schema-form');
    }

    protected function prepareExtraValues(): void
    {
        $this->meta = [];

        if(isset($this->min_value)) {
            $this->meta[] = [
                'key' => 'min_value',
                'value' => $this->min_value,
            ];
        }

        if(isset($this->max_value)) {
            $this->meta[] = [
                'key' => 'max_value',
                'value' => $this->max_value,
            ];
        }
    }
}
