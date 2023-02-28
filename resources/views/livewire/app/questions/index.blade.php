<div>
    <x-app.layouts.header>
        <x-app.layouts.header-left :breadcrumbs="$this->breadcrumbs">
            <x-app.layouts.title>
                {{ __('Voting Questions') }}
            </x-app.layouts.title>
        </x-app.layouts.header-left>
        <x-app.layouts.header-action>
            <button type="button" class="button-primary button-regular" wire:click="addQuestion()">
                Add Question <i class="fa-solid fa-plus ml-2"></i>
            </button>
        </x-app.layouts.header-action>
    </x-app.layouts.header>

    <x-app.layouts.body-fixed>
        <div>
            <livewire:app.questions.components.questions-index-panel
                :questions="$this->contest->questions"
                wire:key="{{ $this->contest->id }}"
            />
        </div>
    </x-app.layouts.body-fixed>

{{--    <x-app.modal class="sm:max-w-lg sm:p-6" title="Add input">--}}
{{--        @if($this->modalComponent)--}}
{{--            @livewire($this->modalComponent, ['contest' => $this->contest], key($this->modalComponentKey))--}}
{{--        @endif--}}
{{--    </x-app.modal>--}}
</div>
