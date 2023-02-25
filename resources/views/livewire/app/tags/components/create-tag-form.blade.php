<form
    class="space-y-8 divide-y divide-gray-200"
    autoComplete="off"
    wire:submit.prevent="submit"
>
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div class="space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4  sm:pt-5">
                <x-app.form.label for="label">Label</x-app.form.label>
                <x-app.form.input type="text" id="label" name="label" wire:model.lazy="label" />
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4  sm:pt-5">
                <x-app.form.label for="color">Colour</x-app.form.label>
                <x-app.form.input type="color" value="#e66465" id="color" name="color" wire:model.lazy="color" />
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="flex justify-end">
            <button
                type="button"
                class="button button-lesser button-regular"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="ml-3 button button-primary button-regular"
                wire:loading.attribute="disabled"
            >
                <span wire:loading.remove wire:target="submit">Save</span>
                <div wire:loading wire:target="submit"><i

                        class="fa-solid fa-circle-notch fa-spin text-white "></i></div>
            </button>
        </div>
    </div>
</form>
