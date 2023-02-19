<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Enums\FieldType;
use Illuminate\Contracts\View\View;

class FileSchemaForm extends BaseSchemaForm
{
    public ?string $file_type = null;
    public ?bool $show_in_preview = false;
    public FieldType $field_type = FieldType::FileUpload;

    public function render(): View
    {
        return view('livewire.app.submission-schemas.components.file-schema-form');
    }

    protected function prepareExtraValues(): void
    {
        $this->meta = [];

        if(isset($this->file_type)) {
            $this->meta[] = [
                'key' => 'file_type',
                'value' => $this->file_type,
            ];
        }
    }
}
