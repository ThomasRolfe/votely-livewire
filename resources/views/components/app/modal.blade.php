<div
    x-cloak
    x-data="{ show: @entangle('modalOpen') }"
    class="relative z-10" role="dialog" aria-modal="true">
    {{-- blurred background --}}
    <div
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500 bg-opacity-80 transition-opacity"></div>
    {{-- modal window --}}
    <div x-show="show"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
            <div
                class="relative bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-5xl w-full sm:p-6">
                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                    <button
                        type="button"
                        class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        @click="show = false"
                    >
                        <span class="sr-only">Close</span>
                        <span>X</span>
                    </button>
                </div>
                @isset($title)
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0  sm:text-left">
                        <h2
                            class="text-xl leading-6 font-medium text-gray-900"
                        >
                            {{ $title }}
                        </h2>
                    </div>
                </div>
                @endisset
                <div class="mt-4">
                    {{ $slot }}
                </div>

            </div>

        </div>
    </div>
</div>
