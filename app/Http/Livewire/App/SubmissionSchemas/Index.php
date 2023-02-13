<?php

namespace App\Http\Livewire\App\SubmissionSchemas;

use App\Http\Livewire\App\SubmissionSchemas\Components\AddSchemaForm;
use App\Models\Contest;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Index extends Component
{
    public Contest $contest;
    public bool $modalOpen = false;
    public string $modalComponent = '';
    public array $breadcrumbs;
    protected $listeners = ['setModalComponent' => 'setModalComponent', 'refreshComponent' => '$refresh'];

    public function mount()
    {
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
    }

    public function addInput()
    {
        $this->modalComponent = AddSchemaForm::class;
        $this->render();
        $this->openModal();
    }
}
