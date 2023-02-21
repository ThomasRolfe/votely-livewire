<div class="col-span-6">
    <x-app.card>
        <x-app.card-header>
            <div>
                <h3 class="text-lg font-medium leading-6 text-slate-700">
                    Contest information
                </h3>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('contests.edit', $this->contest) }}"
                   class="button-primary button-small ml-4 text-white">
                    <span>Edit</span>
                    <i class="fa-solid fa-pencil ml-4 flex-shrink text-white"></i>
                </a>
            </div>
        </x-app.card-header>
        <div class="px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-slate-100">
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->contest->name }}
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->contest->description }}
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Submissions</dt>
                    <dd class="mt-1 flex flex-col gap-3 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div>
                            <span class="text-sm font-medium text-gray-500"> Start: </span>
                            {{ $this->contest->submission_start_date?->toRfc7231String() ?? 'N/A'  }}
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-500">End: </span>
                            {{ $this->contest?->submission_end_date?->toRfc7231String() ?? 'N/A'  }}
                        </div>
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Voting</dt>
                    <dd class="mt-1 flex flex-col gap-3 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div>
                            <span class="text-sm font-medium text-gray-500">Start: </span>
                            {{ $this->contest?->vote_start_date?->toRfc7231String() ?? 'N/A' }}
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-500">End: </span>
                            {{ $this->contest?->vote_end_date?->toRfc7231String() ?? 'N/A' }}
                        </div>
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="flex text-sm font-medium text-gray-500">
                        <span>Public key </span>
                        <button>

                            <i title="Regenerate public key" class="fa-solid fa-arrow-rotate-right fa-lg ml-2 text-green-500" wire:click="regeneratePublicKey"></i>
                        </button>
                    </dt>
                    <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->contest->public_key }}
                        {{--                        {contest?.public_key}--}}
                        {{--                        <Icon--}}
                        {{--                            onClick={() => {--}}
                        {{--                        navigator.clipboard.writeText(--}}
                        {{--                        `${window.location.host}/enter/${contest?.public_key}`--}}
                        {{--                        )--}}
                        {{--                        }}--}}
                        {{--                        IconElement={ClipboardCopyIcon}--}}
                        {{--                        class="ml-4 text-gray-500 hover:cursor-pointer hover:text-blue-500"--}}
                        {{--                        title="Copy to clipboard"--}}
                        {{--                        />--}}
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="flex text-sm font-medium text-gray-500">
                        Cover image
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="max-w-96 max-h-96 ">
                            @if(isset($this->coverImagePath))
                                <img src="{{ $this->coverImagePath }}" width="{{ $this->contest->coverImage->width }}"
                                     height="{{ $this->contest->coverImage->height }}" />

                            @else
                                N/A
                            @endif
                        </div>
                    </dd>
                </div>
            </dl>
        </div>
    </x-app.card>
</div>
