<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components;

use App\Models\FieldType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AddSchemaForm extends Component
{
    public Collection $fieldTypes;

    public function mount()
    {
        $this->fieldTypes = FieldType::all();
    }

    public function render()
    {
        return view('livewire.app.submission-schemas.components.add-schema-form');
    }

    public function setModalComponent(string $component, int $fieldTypeId)
    {
        $this->emit(
            'setModalComponent',
            $this->getComponentClass($component)
        );
    }

    private function getComponentClass(string $component): string
    {
        return match ($component) {
            'text-input' => TextInputSchemaForm::class,
            'number-input' => NumberInputSchemaForm::class,
            'email-input' => EmailInputSchemaForm::class,
            'url-input' => UrlInputSchemaForm::class,
            'text-area' => TextAreaSchemaForm::class,
            'select' => SelectSchemaForm::class,
            'file' => FileSchemaForm::class,
            'checkbox' => CheckboxSchemaForm::class,
            default => '',
        };
    }
}
