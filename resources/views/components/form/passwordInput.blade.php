{{--@props(['label'])--}}

{{--<div class="form-group">--}}
{{--    <label for="" class="block mb-2 text-xs font-bold uppercase text-blueGray-600"--}}
{{--           htmlfor="grid-password">{{ $label }}</label>--}}
{{--</div>--}}
{{--<input--}}
{{--    {{ $attributes->merge(['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-2 focus:ring-black-500 ring-inset w-full ease-linear transition-all duration-150']) }}>--}}

{{--<div class="w-full max-w-sm min-w-[200px]">--}}
{{--    <div class="relative">--}}
{{--        <input type="text" class="w-full pl-3 pr-10 py-2 bg-transparent placeholder:text-slate-400 text-slate-600 text-sm border border-slate-200 rounded-md transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Type here..." />--}}

{{--        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute w-5 h-5 top-2.5 right-2.5 text-slate-600">--}}
{{--            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z"></path>--}}
{{--        </svg>--}}
{{--    </div>--}}
{{--</div>--}}
@props(['label', 'type' => 'text', 'icon' => false, 'visible' => false, 'toggleVisibility' => null])

<div class="form-group relative">
    <!-- Label -->
    <label for="" class="block mb-2 text-xs font-bold uppercase text-blueGray-600"
           htmlfor="grid-password">{{ $label }}</label>

    <!-- Input -->
    <input
        type="{{ $type }}"
        {{ $attributes->merge(['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-2 focus:ring-black-500 ring-inset w-full ease-linear transition-all duration-150 pr-10']) }}
    >

    <!-- Eye Icon for Password Toggle -->
    @if ($icon)
        <button
            type="button"
            wire:click.prevent="{{ $toggleVisibility }}"
            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-800"
        >
        @if ($visible)
            <!-- Eye Slash Icon -->
                <x-phosphor.icons::regular.eye-slash class="w-5 h-5"/>
        @else
            <!-- Eye Icon -->
                <x-phosphor.icons::regular.eye class="w-5 h-5"/>
            @endif
        </button>
    @endif
</div>
