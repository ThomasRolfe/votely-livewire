@php
    $baseInputClass = 'block w-full min-w-0 flex-1 rounded-md sm:text-sm';
    $defaultInputClass = 'border-gray-300 focus:border-blue-500 focus:ring-blue-500';
    $errorInputClass = 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500';
@endphp

<div class="{{ $class ?? '' }}">
    <div class="relative mt-1">
        <input
            @error($name)
            class="{{ $baseInputClass . " " . $errorInputClass }}"
            @else
                class="{{ $baseInputClass . " " . $defaultInputClass }}"
            @enderror
            {{ $attributes }}
        />
    </div>
    @error($name)
    <x-app.form.validation-error>
        {{ $message }}
    </x-app.form.validation-error>
    @enderror
</div>


