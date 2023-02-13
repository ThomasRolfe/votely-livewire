<?php

namespace App\Http\Livewire\App\SubmissionSchemas\Components;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SubmissionSchemasIndexPanel extends Component
{
    public Collection $submissionSchemas;

    public function render()
    {
        return view('livewire.app.submission-schemas.components.submission-schemas-index-panel');
    }
}
