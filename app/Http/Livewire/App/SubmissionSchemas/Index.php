<?php

namespace App\Http\Livewire\App\SubmissionSchemas;

use App\Http\Livewire\App\SubmissionSchemas\Components\AddSchemaForm;
use App\Models\Contest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    public Contest $contest;
    public bool $modalOpen = false;
    public string $modalComponent = '';
    public string $modalComponentKey = 'default';
    public array $breadcrumbs;
    protected $listeners = [
        'setModalComponent' => 'setModalComponent',
        'refreshComponent' => '$refresh',
        'submissionSchemaCreated' => 'submissionSchemaCreated',
    ];

    public function mount()
    {
        $this->authorize('view', $this->contest);

        $this->breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
            ],
            [
                'name' => $this->contest->name,
                'href' => route('contests.show', $this->contest),
            ],
            [
                'name' => 'Submission Schema',
                'href' => URL::current(),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.submission-schemas.index')->with(['modalComponent' => $this->modalComponent]);
    }

    public function openModal()
    {
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
    }

    public function setModalComponent(string $component)
    {
        $this->modalComponent = $component;
        $this->modalComponentKey = stripslashes($component);
    }

    public function submissionSchemaCreated()
    {
        $this->contest = Contest::find($this->contest->id);
        $this->closeModal();
    }

    public function addInput()
    {
        $this->setModalComponent(AddSchemaForm::class);
        $this->openModal();
    }
}
