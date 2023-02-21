<div>
    <x-app.layouts.header>
        <x-app.layouts.header-left :breadcrumbs="$breadcrumbs">
            <x-app.layouts.title>
                {{ __('Contest Submission Form Fields') }}
            </x-app.layouts.title>
        </x-app.layouts.header-left>
        <x-app.layouts.header-action>
            <button type="button" class="button-primary button-regular" wire:click="addInput()">
                Add Field <i class="fa-solid fa-plus ml-2"></i>
            </button>
        </x-app.layouts.header-action>
    </x-app.layouts.header>

    <x-app.layouts.body>
        <div>
            <livewire:app.submission-schemas.components.submission-schemas-index-panel
                :submissionSchemas="$this->contest->submissionSchemas"
                wire:key="{{ $this->contest->id }}"
            />
        </div>
    </x-app.layouts.body>

    <x-app.modal class="sm:max-w-lg sm:p-6" title="Add input">
        @if($this->modalComponent)
            @livewire($this->modalComponent, ['contest' => $this->contest], key($this->modalComponentKey))
        @endif
    </x-app.modal>
</div>
