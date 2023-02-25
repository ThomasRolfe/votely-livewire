<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components;

use App\Actions\SubmissionSchemas\SetSubmissionSchemaOrder;
use App\DataTransferObjects\SubmissionSchemas\SubmissionSchemaOrderData;
use Illuminate\Support\Collection;
use Livewire\Component;

class SubmissionSchemasIndexPanel extends Component
{
    public Collection $submissionSchemas;

    public function setSubmissionSchemaOrder(array $items): void
    {
        $submissionSchemas = SetSubmissionSchemaOrder::run(
            SubmissionSchemaOrderData::collection($items)
        );

        $this->hydrateSchemas($submissionSchemas);
    }

    public function hydrateSchemas($schemas)
    {
        $this->submissionSchemas = $schemas;
    }

    public function render()
    {
        return view('livewire.app.submission-schemas.components.submission-schemas-index-panel');
    }
}
