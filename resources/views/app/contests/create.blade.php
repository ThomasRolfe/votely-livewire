<x-app-layout>

    <x-app.layouts.header>
        <x-app.layouts.header-left :breadcrumbs="$breadcrumbs">
            <x-app.layouts.title>
                {{ __('Create Contest') }}
            </x-app.layouts.title>
        </x-app.layouts.header-left>
    </x-app.layouts.header>

    <x-app.layouts.body>
        <x-app.card>
            <x-app.card-body>
                <livewire:create-contest-form />
            </x-app.card-body>
        </x-app.card>
    </x-app.layouts.body>

</x-app-layout>
