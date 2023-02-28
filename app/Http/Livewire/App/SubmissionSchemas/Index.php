<?php

namespace App\Http\Livewire\App\SubmissionSchemas;

use App\Http\Livewire\App\SubmissionSchemas\Components\AddSchemaForm;
use App\Models\Contest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\URL;
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

    /**
     * @throws AuthorizationException
     */
    public function mount(): void
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
                'name' => 'Submission Form Fields',
                'href' => URL::current(),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.submission-schemas.index')->with(['modalComponent' => $this->modalComponent]);
    }

    public function openModal(): void
    {
        $this->modalOpen = true;
    }

    public function closeModal(): void
    {
        $this->modalOpen = false;
    }

    public function setModalComponent(string $component): void
    {
        $this->modalComponent = $component;
        $this->modalComponentKey = stripslashes($component);
    }

    public function submissionSchemaCreated(): void
    {
        $this->contest = Contest::find($this->contest->id);
        $this->closeModal();
    }

    public function addInput(): void
    {
        $this->setModalComponent(AddSchemaForm::class);
        $this->openModal();
    }
}
