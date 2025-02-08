@props([
    'placeholder' => 'Select an option',
    'label' => '',
    'options' => '',
    'limit' => 40,
])

<div wire:ignore x-data="{
        values: @entangle($attributes->wire('model')),
        choices: null
    }"
     x-init="
        choices = new Choices($refs.multiple, {
            itemSelectText: '',
            removeItems: true,
            removeItemButton: true,
        });

        // Set initial selected values in Choices.js
        values.forEach(value => choices.setChoiceByValue(value));

        // Listen for change events to update the Livewire property with selected values only
        $refs.multiple.addEventListener('change', function () {
            values = Array.from($refs.multiple.selectedOptions).map(option => option.value);
        });
    "
>
    @if($label)
        <label for="select-multiple">{{ $label }}</label>
    @endif

    <select x-ref="multiple" multiple="multiple">
        @foreach($options as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>
