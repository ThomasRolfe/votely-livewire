<div role="list" class="space-y-6">
    @foreach($submissionSchemas as $submissionSchema)
        <x-app.card>
            <x-app.card-body class="flex justify-between">
                <div class="flex">
                    <span>{{ $submissionSchema->label }}</span>
                </div>
                <span>{{ $submissionSchema->fieldType->nice_name }}</span>
            </x-app.card-body>
        </x-app.card>
    @endforeach
</div>
