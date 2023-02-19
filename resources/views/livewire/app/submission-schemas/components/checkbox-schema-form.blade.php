<div class="mt-8">
    <h3 class="text-lg font-medium text-gray-700">Checkbox input</h3>

    <form class="space-y-12 " wire:submit.prevent="submit">
        <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <x-app.form.label for="label">Label</x-app.form.label>
                <div class="mt-1 flex max-w-lg rounded-md shadow-sm sm:col-span-2 sm:mt-0">
                    <x-app.form.input
                        type="text"
                        name="label"
                        id="label"
                        wire:model.defer="label"
                        required
                    />
                    @error('label')<span>ERROR WITH LABEL {{ $message }}</span>@enderror
                </div>
            </div>
            <x-app.form.label for="required">Field is required</x-app.form.label>
            <x-app.form.checkbox name="required" id="required" wire:model.defer="required" />

            <x-app.form.label for="visible_to_voters">Visible to voters</x-app.form.label>
            <x-app.form.checkbox name="visible_to_voters" id="visible_to_voters" wire:model.defer="visible_to_voters" />
        </div>
        <div class="flex justify-end">
            <button class="button-lesser button-regular" type="button">Close</button>
            <button class="button-lesser button-regular ml-3" type="submit">Submit</button>
        </div>
    </form>
</div>
