<div class="hidden lg:flex lg:flex-col lg:w-56 lg:fixed lg:inset-y-0 lg:pt-5 lg:pb-4 lg:bg-navy-mid text-slate-100">
    <div class="flex items-center flex-shrink-0 px-6">
        {{--        {/* <img--}}
        {{--            class="h-8 w-auto"--}}
        {{--            src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-white-text.svg"--}}
        {{--            alt="Workflow"--}}
        {{--        /> */}--}}
    </div>

    <div class="mt-6 h-0 flex-1 flex flex-col overflow-y-auto">

        <nav class="px-3 mt-6">
            <div class="space-y-3">
                @foreach($links as $link)
                    <a href="{{ $link['href'] }}"
                       class="{{ $link['isCurrent'] ? 'bg-navy-dark text-slate-100' : 'text-slate-100  hover:bg-slate-700' }} group flex items-center px-3 py-2 text-sm font-medium rounded-md transition">
                        {{ __($link['name']) }}
                    </a>
                @endforeach

                <div class="border-gray-700 border-t">

                </div>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <a class="text-slate-100 hover:bg-slate-700 group flex items-center px-3 py-2 text-sm font-medium rounded-md transition"
                       href="{{ route('logout') }}"
                       @click.prevent="$root.submit();"
                    >
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </nav>
    </div>
</div>
