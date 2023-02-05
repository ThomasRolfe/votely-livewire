<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Lexend:wght@400;500&display=swap"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-jet-banner/>

<div class="min-h-full">
{{--    {/* Mobile view nav */}--}}
{{--    mobile nav--}}
{{--    <Navigation sidebarOpen={sidebarOpen} setSidebarOpen={setSidebarOpen} />--}}

{{--    {/* Main column right */}--}}
    <div class="flex flex-col lg:pl-56">
{{--        {/* Search header */}--}}
        <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 border-b border-gray-200 bg-white lg:hidden">
            <button
                type="button"
                class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden"
{{--                onClick={() => setSidebarOpen(true)}--}}
            >
            <span class="sr-only">Open sidebar</span>
{{--            <MenuAlt1Icon class="h-6 w-6" aria-hidden="true" />--}}
            </button>
        </div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</div>

{{--<div className="min-h-full">--}}
{{--    @livewire('navigation-menu')--}}

{{--    <!-- Page Heading -->--}}
{{--    @if (isset($header))--}}
{{--        <header class="bg-white shadow">--}}
{{--            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                {{ $header }}--}}
{{--            </div>--}}
{{--        </header>--}}
{{--    @endif--}}

{{--    <!-- Page Content -->--}}
{{--    <main>--}}
{{--        {{ $slot }}--}}
{{--    </main>--}}
{{--</div>--}}

@stack('modals')

@livewireScripts
</body>
</html>
