<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components;

use App\Enums\FieldType;
use Livewire\Component;

class AddSchemaForm extends Component
{
    public function render()
    {
        return view('livewire.app.submission-schemas.components.add-schema-form');
    }

    public function setModalComponent(string $component)
    {
        $this->emit(
            'setModalComponent',
            $this->getComponentClass($component)
        );
    }

    private function getComponentClass(string $component): string
    {
        return FieldType::from($component)->submissionSchemaComponent();
    }
}
