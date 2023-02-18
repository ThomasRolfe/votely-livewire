<div role="list" class="space-y-6">
    @foreach($submissionSchemas as $submissionSchema)
        <x-app.card>
            <x-app.card-body class="flex justify-between">
                <div class="flex">
                    <span>{{ $submissionSchema->label }}</span>
                </div>
                <span>{{ $submissionSchema->field_type->niceName() }}</span>
            </x-app.card-body>
        </x-app.card>
    @endforeach
</div>
