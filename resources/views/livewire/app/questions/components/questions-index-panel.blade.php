<ul role="list" class="grid gap-6 grid-cols-1"
    wire:sortable="setQuestionOrder"
>
    @foreach($this->questions as $question)

        <li
            wire:sortable.item="{{ $question->id }}" wire:key="question-{{ $question->id }}"
        >
            <x-app.card >
                <x-app.card-body class="flex justify-between">
                    <div class="flex items-center">
                        <i class="fa-solid fa-grip-lines hover:cursor-grab mr-4"
                           wire:sortable.handle
                        ></i>
                        <span >{{ $question->text }}</span>
                    </div>
                </x-app.card-body>
            </x-app.card>
        </li>
    @endforeach
</ul>


