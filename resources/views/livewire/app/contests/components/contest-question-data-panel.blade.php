<div class="col-span-6 md:col-span-3">
    <x-app.card>
        <x-app.card-header>
            <h3 class="text-lg font-medium leading-6 text-slate-700">
                Questions
            </h3>
            <a href="{{ route('contests.questions.edit', $contest) }}"
               class="button-primary button-small ml-4 text-white">
                <span>Edit</span>
                <i class="fa-solid fa-pencil ml-4 flex-shrink text-white"></i>
            </a>
        </x-app.card-header>
        <div>
            @if(count($contest->questions) > 0)
                <ul role="list" class="divide-y divide-slate-100">
                    @foreach($contest->questions as $question)
                        <li class="flex py-4 px-4 sm:px-6">
                            <div class="flex w-full flex-col">
                                <p class="flex w-full justify-between text-sm font-medium text-gray-900">
                                    <span>{{ $question->text }}</span>
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="p-4 text-center">
                    <h3 class="text-sm font-medium text-gray-900">
                        No questions created
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Add questions to allow voting on competition entries.
                    </p>
                </div>
            @endif

        </div>
    </x-app.card>
</div>
