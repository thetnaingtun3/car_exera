<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? '' }} </title>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('flowbite/css/app.css') }}">

    @vite('resources/css/app.css')

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.5/dist/quill.snow.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.5/dist/quill.snow.css" rel="stylesheet" />
    @livewireStyles
    @filamentStyles
    @stack('styles')

</head>

<body class=" bg-gray-50 dark:bg-gray-800">
    @include('components.layouts.leftside')

    <div class="bg-gray-50 dark:bg-gray-900">


        <div id="main-content" class="mb-5 bg-gray-50 lg:ml-64 dark:bg-gray-900 ">
            @include('components.layouts.nav')
            <main class="flex-1 bg-base-200">
                {{ $slot }}
                @livewire('notifications')

                <x-form.notifications />
            </main>
        </div>
    </div>

    {{--
<body class="relative flex flex-col min-h-screen bg-gray-50 dark:bg-gray-800">
<div class="flex overflow-hidden bg-gray-50 dark:bg-gray-900">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900 ">
        @include('components.layouts.nav')
        <main class="flex-1 overflow-y-auto bg-base-200">
            {{ $slot }}
            @livewire('notifications')
        </main>
    </div>
</div>
 --}}
    <script async defer src="{{ asset('flowbite/js/buttons.js') }}"></script>
    <script src="{{ asset('flowbite/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('flowbite/js/flowbite.min.js') }}"></script>
    <script async defer src="{{ asset('flowbite/js/buttons.js') }}"></script>
    <script async defer src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.5/dist/quill.js"></script>
    <script></script>
    {{-- @livewireScripts --}}
    @livewireScriptConfig
    @filepondScripts
    @filamentScripts
    @vite('resources/js/app.js')

    @yield('scripts')
</body>

</html>
