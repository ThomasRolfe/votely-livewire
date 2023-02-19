<form class="space-y-8" autoComplete="off" wire:submit.prevent="submit">
    <div class="">
        <div class="space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                <x-app.form.label for="name">Name *</x-app.form.label>
                <x-app.form.input
                    id="name"
                    name="name"
                    type="text"
                    autoComplete="off"
                    class="sm:col-span-2"
                    wire:model.lazy="name"
                />
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <x-app.form.label for="description">Description *</x-app.form.label>
                <x-app.form.textarea
                    id="description"
                    name="description"
                    rows="3"
                    autoComplete="off"
                    class="sm:col-span-2"
                    wire:model.lazy="description"
                />
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <x-app.form.label for="cover_image">Cover photo</x-app.form.label>
                <x-app.form.file-input
                    id="cover_image"
                    name="cover_image"
                    type="file"
                    wire:model="cover_image"
                />
                @error('cover_image') <span class="error ">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Submission activation
            </h3>
        </div>
        <div class="space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                <x-app.form.label for="submission_start_date">Start date</x-app.form.label>
                <x-app.form.input
                    type="datetime-local"
                    name="submission_start_date"
                    id="submission_start_date"
                    wire:model.lazy="submission_start_date"
                />
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <x-app.form.label for="submission_end_date">End date</x-app.form.label>
                <x-app.form.input
                    type="datetime-local"
                    name="submission_end_date"
                    id="submission_end_date"
                    wire:model.lazy="submission_end_date"
                />
            </div>
        </div>
    </div>

    <div class="space-y-6 pt-8 sm:space-y-5 ">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Voting activation
            </h3>
        </div>
        <div class="space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                <x-app.form.label for="vote-start-date">Start date</x-app.form.label>
                <x-app.form.input
                    type="datetime-local"
                    name="vote-start-date"
                    id="vote-start-date"
                    wire:model.lazy="vote_start_date"
                />
                @error('vote_start_date') <span class="error ">{{ $message }}</span> @enderror
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <x-app.form.label for="vote-end-date">End date</x-app.form.label>
                <x-app.form.input
                    type="datetime-local"
                    name="vote-end-date"
                    id="vote-end-date"
                    wire:model.lazy="vote_end_date"
                />
                @error('vote_end_date') <span class="error ">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="flex justify-end">
            <button class="button-primary button-regular ml-3" type="submit">Submit</button>
        </div>
    </div>
</form>
