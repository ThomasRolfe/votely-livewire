<x-app-layout>

    <x-app.layouts.header>
        <x-app.layouts.header-left>
            <x-app.layouts.title>
                {{ __('Dashboard') }}
            </x-app.layouts.title>
        </x-app.layouts.header-left>
    </x-app.layouts.header>

    <x-app.layouts.body>
        <h3>Welcome {{ Auth::user()->name }}</h3>
    </x-app.layouts.body>

</x-app-layout>
