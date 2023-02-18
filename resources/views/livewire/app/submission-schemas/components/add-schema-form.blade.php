<div class="mt-8 flex flex-col">
    <ul
        role="list"
        class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3"
    >
        @foreach(\App\Enums\FieldType::cases() as $fieldType)
            <li
                wire:click="setModalComponent('{{ $fieldType->value }}')"
                wire:key="$fieldType->element"
{{--                wire:click="setModalComponent({{ $fieldType->element}})"--}}
                class="col-span-1 bg-slate-100 rounded-lg divide-y divide-gray-200 border-2 border-transparent hover:cursor-pointer hover:border-blue-400 transition"
            >
                <div class="w-full flex items-center justify-between p-6 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-medium truncate">
                                {{ $fieldType->niceName() }}
                            </h3>
                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">
{{--                            {/* {person.role} */}--}}
                        </span>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">
{{--                            {/* {person.title} */}--}}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
