<x-app-layout>

    <x-layouts.app.header>
        <x-layouts.app.header-left>
            <x-layouts.app.title>
                {{ __('Dashboard') }}
            </x-layouts.app.title>
        </x-layouts.app.header-left>
    </x-layouts.app.header>

    <x-layouts.app.body>
        <h3>Welcome {{ Auth::user()->name }}</h3>
    </x-layouts.app.body>

</x-app-layout>
