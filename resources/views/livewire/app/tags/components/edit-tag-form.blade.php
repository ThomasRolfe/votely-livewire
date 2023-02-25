<form
    class="space-y-8 divide-y divide-gray-200"
    autoComplete="off"
    wire:submit.prevent="submit"
>
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div class="space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4  sm:pt-5">
                <x-app.form.label for="label">Label</x-app.form.label>
                <x-app.form.input type="text" id="label" name="label" value="{{ $this->tag->label }}" wire:model.lazy="label" />
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4  sm:pt-5">
                <x-app.form.label for="color">Colour</x-app.form.label>
                <x-app.form.input type="color" value="#e66465" id="color" value="{{ $this->tag->color }}" name="color" wire:model.lazy="color" />
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="flex justify-end">
            <button
                type="button"
                class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Save
            </button>
        </div>
    </div>
</form>
