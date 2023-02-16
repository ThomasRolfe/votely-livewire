<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components;

use App\Actions\SubmissionSchemas\CreateSubmissionSchema;
use App\DataTransferObjects\SubmissionSchemaData;
use App\Http\Requests\StoreSubmissionSchemaRequest;
use App\Models\Contest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class TextInputSchemaForm extends Component
{
    public string $label;
    public string $field_type_id;
    public ?bool $required = false;
    public ?bool $visible_to_voters = false;
    public Contest $contest;

    public function mount()
    {
        $this->field_type_id = 1;
    }

    protected function messages(): array
    {
        return (new StoreSubmissionSchemaRequest)->messages();
    }

    protected function rules(): array
    {
        return (new StoreSubmissionSchemaRequest)->rules();
    }

    public function render()
    {
        return view('livewire.app.submission-schemas.components.text-input-schema-form');
    }

    public function submit()
    {
        $validated = Validator::make(
            $this->all(),
            $this->rules(),
            $this->messages()
        )->validate();

        CreateSubmissionSchema::run(
            SubmissionSchemaData::from($validated),
            $this->contest
        );

        $this->emit('submissionSchemaCreated');
    }
}
