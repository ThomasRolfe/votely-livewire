<ul role="list" class="grid gap-6 grid-cols-1"
    wire:sortable="setSubmissionSchemaOrder"
   >
    @foreach($this->submissionSchemas as $submissionSchema)
        <li
            wire:sortable.item="{{ $submissionSchema->id }}" wire:key="schema-{{ $submissionSchema->id }}"
        >
            <x-app.card >
                <x-app.card-body class="flex justify-between">
                    <div class="flex items-center">
                        <i class="fa-solid fa-grip-lines hover:cursor-grab mr-4"
                           wire:sortable.handle
                        ></i>
                        <span >{{ $submissionSchema->label }}</span>
                    </div>
                    <span>{{ $submissionSchema->field_type->niceName() }}</span>
                </x-app.card-body>
            </x-app.card>
        </li>
    @endforeach
</ul>


