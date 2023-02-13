<x-app.layouts.header>
    <x-app.layouts.header-left :breadcrumbs="$breadcrumbs">
        <x-app.layouts.title>
            {{ $contest->name }}
        </x-app.layouts.title>
    </x-app.layouts.header-left>
</x-app.layouts.header>

<x-app.layouts.body>
    <div class="grid grid-cols-6 gap-4 md:gap-5">
        <livewire:app.contests.components.contest-information-panel :contest="$contest"/>
        <livewire:app.contests.components.contest-submission-schema-data-panel :contest="$contest"/>
        <livewire:app.contests.components.contest-question-data-panel :contest="$contest"/>
    </div>
</x-app.layouts.body>
