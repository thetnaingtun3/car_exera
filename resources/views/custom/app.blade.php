<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{$title ?? " "}} </title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('flowbite/css/app.css')}}">
    {{--    <script>--}}
    {{--        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
    {{--            document.documentElement.classList.add('dark');--}}
    {{--        } else {--}}
    {{--            document.documentElement.classList.remove('dark')--}}
    {{--        }--}}
    {{--    </script>--}}
</head>
<body class="bg-gray-50 dark:bg-gray-800">

<main class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
        <a href="https://flowbite-admin-dashboard.vercel.app/"
           class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
            <!-- <img src="https://flowbite-admin-dashboard.vercel.app/images/logo.svg" class="mr-4 h-11"
                 alt="FlowBite Logo"> -->
            {{--            <img src="{{ asset('images/logo/SFG.png') }}" class="mr-4 h-11" alt="SFG Logo">--}}
            <span class="text-3xl text-primary-500 dark:text-primary-400">LOGO</span>
        </a>
        <div class="w-full max-w-xl p-6 space-y-8 bg-white rounded-lg shadow sm:p-8 dark:bg-gray-800">
            {{$slot}}
        </div>
    </div>
</main>

<script async defer src="{{ asset('flowbite/js/buttons.js') }}"></script>
{{--<script src="{{ asset('flowbite/js/app.bundle.js') }}"></script>--}}

<script src="{{ asset('flowbite/js/flowbite.min.js') }}"></script>
</body>

</html>
