<x-app.layouts.header>
    <x-app.layouts.header-left :breadcrumbs="$breadcrumbs">
        <x-app.layouts.title>
            {{ __('Contests') }}
        </x-app.layouts.title>
    </x-app.layouts.header-left>
    <x-app.layouts.header-action>
        <a class="button-primary button-regular" href="{{ route('contests.create') }}">
            <span>Create</span>
        </a>
    </x-app.layouts.header-action>
</x-app.layouts.header>

<x-app.layouts.body>

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

</x-app.layouts.body>

