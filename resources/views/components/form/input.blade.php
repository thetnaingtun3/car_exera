@props(['label'])

<div class="form-group">
    <label for="" class="block mb-2 text-xs font-bold uppercase text-blueGray-600"
        htmlfor="grid-password">{{ $label }}</label>
</div>
<input
    {{ $attributes->merge(['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-2 focus:ring-black-500 ring-inset w-full ease-linear transition-all duration-150']) }}>
