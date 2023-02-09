<x-app-layout>

    <x-layouts.app.header>
        <x-layouts.app.header-left>
            <x-layouts.app.breadcrumbs :navigation_path="$breadcrumbs"/>
            <x-layouts.app.title>
                {{ __('Contests') }}
            </x-layouts.app.title>
        </x-layouts.app.header-left>
        <x-layouts.app.header-action>
            <a class="bg-blue-600 text-white hover:bg-blue-700 inline-flex items-center justify-center border hover:cursor-pointer py-2 px-4 text-sm focus:ring-5 rounded-md font-medium focus:outline-blue-700 focus:ring-slate-300 focus:ring-offset-2"
               href="{{ route('contests.create') }}">
                <span>Create</span>
            </a>
        </x-layouts.app.header-action>
    </x-layouts.app.header>

    <x-layouts.app.body>

        @empty($contests)
            <div>You have not yet created any contests.</div>
        @endempty

        @isset($contests)
            <ul
                role="list"
                class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4"
            >
                @foreach($contests as $contest)
                    <li class="col-span-1 p-4 flex flex-col text-center bg-white rounded-lg shadow hover:shadow-lg transition divide-y divide-gray-200">
                        <a href="{{ route('contests.index') }}/{{ $contest->id }}">
                            <div class="my-2">{{ $contest->name }}</div>
                            <div class="my-2">{{ $contest->description }}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endisset

    </x-layouts.app.body>

</x-app-layout>
