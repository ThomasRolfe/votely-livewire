<x-app.layouts.header>
    <x-app.layouts.header-left :breadcrumbs="$breadcrumbs">
        <x-app.layouts.title>
            {{ __('Create Tag') }}
        </x-app.layouts.title>
    </x-app.layouts.header-left>
</x-app.layouts.header>

<x-app.layouts.body>
    <x-app.card>
        <x-app.card-body>
            <livewire:app.tags.components.create-tag-form />
        </x-app.card-body>
    </x-app.card>
</x-app.layouts.body>

