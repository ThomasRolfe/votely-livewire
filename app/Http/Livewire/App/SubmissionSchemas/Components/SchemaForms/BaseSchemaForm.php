<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms;

use App\Actions\SubmissionSchemas\CreateSubmissionSchema;
use App\DataTransferObjects\SubmissionSchemas\SubmissionSchemaData;
use App\Enums\FieldType;
use App\Http\Requests\StoreSubmissionSchemaRequest;
use App\Models\Contest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

abstract class BaseSchemaForm extends Component
{
    public string $label;
    public ?bool $required = false;
    public ?bool $visible_to_voters = false;
    public array $meta = [];
    public FieldType $field_type;
    public Contest $contest;

    protected function messages(): array
    {
        return (new StoreSubmissionSchemaRequest)->messages();
    }

    protected function rules(): array
    {
        return (new StoreSubmissionSchemaRequest)->rules();
    }

    protected function prepareExtraValues(): void
    {

    }

    abstract public function render(): View;

    /**
     * @throws ValidationException
     */
    public function submit(): void
    {
        $this->prepareExtraValues();

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
