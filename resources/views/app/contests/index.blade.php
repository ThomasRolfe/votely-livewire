<x-app-layout>

    <x-layouts.app.header>
        <x-layouts.app.header-left>
            <x-layouts.app.title>
                {{ __('Contests') }}
            </x-layouts.app.title>
        </x-layouts.app.header-left>
        <x-layouts.app.header-action>
            <a class="bg-blue-600 text-white hover:bg-blue-700 inline-flex items-center justify-center border hover:cursor-pointer py-2 px-4 text-sm focus:ring-5 rounded-md font-medium focus:outline-blue-700 focus:ring-slate-300 focus:ring-offset-2" href="{{ route('contests.create') }}">
                <span>Create</span>
            </a>
        </x-layouts.app.header-action>
    </x-layouts.app.header>

    <x-layouts.app.body>
        <h3>Contests</h3>
    </x-layouts.app.body>

</x-app-layout>
