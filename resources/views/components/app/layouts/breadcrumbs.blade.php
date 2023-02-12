@isset($breadcrumbs)
<div class="mb-2">
    <nav class="sm:hidden" aria-label="Back">
        @if(count($breadcrumbs) > 1)
            <a href="{{ $breadcrumbs[count($breadcrumbs) - 2]["href"] }}"
               class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <
                Back
            </a>
        @else
            <a href="{{ route('dashboard') }}"
               class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <
                Back
            </a>
        @endif
    </nav>
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            @foreach($breadcrumbs as $index => $navItem)
                <li>
                    <div class="flex items-center">
                        @if(!$loop->first)
                            >
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
@endisset
