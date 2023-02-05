<div class="mb-2">
    <nav class="sm:hidden" aria-label="Back">
        <a href="{{ $navigationPath[count($navigationPath) - 2]["href"] }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
{{--            <ChevronLeftIcon--}}
{{--                class="-ml-1 mr-1 h-5 w-5 flex-shrink-0 text-gray-400"--}}
{{--                aria-hidden="true"--}}
{{--            />--}}
            <
            Back
        </a>
    </nav>
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            @foreach($navigationPath as $index => $navItem)
                <li>
                    <div class="flex items-center">
                        @if(!$loop->first)
                            >
{{--                            <ChevronRightIcon--}}
{{--                                class="mr-4 h-5 w-5 flex-shrink-0 text-gray-400"--}}
{{--                                aria-hidden="true"--}}
{{--                            />--}}
                        @endif
                        <a href="{{ $navItem["href"] }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                            {{ $navItem["name"]}}
                        </a>
                    </div>
                </li>
            @endforeach
        </ol>
    </nav>
</div>
