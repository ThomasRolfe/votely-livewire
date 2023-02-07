<x-app-layout>

    <x-layouts.app.header>
        <x-layouts.app.header-left>
            <x-layouts.app.breadcrumbs :navigation_path="$breadcrumbs" />
            <x-layouts.app.title>
                {{ __('Create Contest') }}
            </x-layouts.app.title>
        </x-layouts.app.header-left>
    </x-layouts.app.header>

    <x-layouts.app.body>
        <h3>{{ __('Create Contest') }}</h3>
    </x-layouts.app.body>

</x-app-layout>
