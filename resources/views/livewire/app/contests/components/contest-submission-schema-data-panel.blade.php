<div class="col-span-6 md:col-span-3">
    <x-app.card>
        <x-app.card-header>
            <h3 class="text-lg font-medium leading-6 text-slate-700">
                Submission Form Fields
            </h3>
            <a href="{{ route('contests.submission-schema.index', $contest) }}"
               class="button-primary button-small ml-4 text-white flex">
                <span>Edit</span>
                <i class="fa-solid fa-pencil ml-4 flex-shrink text-white"></i>
            </a>
        </x-app.card-header>
        <div>

            @if(count($contest->submissionSchemas) > 0)
                <ul role="list" class="divide-y divide-slate-100">
                    @foreach($contest->submissionSchemas as $submissionSchema)
                        <li class="flex py-4 px-4 sm:px-6">
                            <div class="flex w-full flex-col">
                                <p class="flex w-full justify-between text-sm font-medium text-gray-900">
                                    <span>{{ $submissionSchema->label }}</span>
                                    @if($submissionSchema->required)
                                        <span
                                            class="inline-flex h-fit items-center rounded-full bg-green-200 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                      Required
                                    </span>
                                    @endif
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $submissionSchema?->field_type?->niceName() }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="p-4 text-center">
                    <h3 class="text-sm font-medium text-gray-900">
                        No submission fields created
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Add submission fields to let users enter your competition.
                    </p>
                </div>
            @endif

        </div>
    </x-app.card>
</div>
