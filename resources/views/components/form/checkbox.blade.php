{{-- @props(['label'])

<div class="form-group">
    <label for="" class="block mb-2 text-xs font-bold uppercase text-blueGray-600"
        htmlfor="grid-password">{{ $label }}</label>
</div>

<input type="checkbox" {!! $attributes->merge(['class' => 'rounded border-gray-800 text-indigo-600 shadow-sm focus:ring-gray-400']) !!}> --}}
@props(['label', 'checked' => false])

<div class="form-group">
    <label for="Check" class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
        {{ $label }}
    </label>
    <input type="checkbox"
           id="Check" {!! $attributes->merge(['class' => 'rounded border-gray-800 text-indigo-600 shadow-sm focus:ring-gray-400']) !!} {{ $checked ? 'checked' : '' }}>
</div>
