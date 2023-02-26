<div>
    <x-app.layouts.header>
        <x-app.layouts.header-left :breadcrumbs="$breadcrumbs">
            <x-app.layouts.title>
                {{ __('Tags') }}
            </x-app.layouts.title>
        </x-app.layouts.header-left>
        <x-app.layouts.header-action>
            <a class="button-primary button-regular" href="{{ route('tags.create') }}">
                <span>Create</span>
            </a>
        </x-app.layouts.header-action>
    </x-app.layouts.header>

    <x-app.layouts.body-fixed>
        <x-app.card>
            @empty($this->tags)
                <div>You have not yet created any tags.</div>
            @endempty

            @isset($this->tags)
                <div>
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach($this->tags as $tag)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <p
                                            style="background-color: {{ $tag->color }}"
                                            class="inline-flex rounded-full px-3 text-xs font-semibold capitalize leading-5 text-white"
                                        >
                                            {{ $tag->label }}
                                        </p>
                                        <div class="ml-2 flex flex-shrink-0">
                                            <a href="{{ route('tags.edit', ['tag' => $tag]) }}"
                                               class="button-primary button-small ml-4 text-white">
                                                <i class="fa-solid fa-pencil flex-shrink"></i>
                                            </a>
                                            <button x-on:confirm="{
                                                title: 'Delete tag',
                                                description: 'Are you sure you want to delete this tag?',
                                                icon: 'warning',
                                                method: 'delete',
                                                params: {tag: {{ $tag }}}
                                            }"
                                                 class="button-lesser button-small ml-4 text-grey-500">
                                                <i class="fa-solid fa-trash flex-shrink"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            @endisset
        </x-app.card>


    </x-app.layouts.body-fixed>
</div>
