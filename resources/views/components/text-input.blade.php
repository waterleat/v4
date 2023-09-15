@props([
    'disabled' => false,
    'type' => 'text',
    'min',
    'max',
    'step'])

<input {{ $disabled ? 'disabled' : '' }} type="{{ $type }}" min="{{ $min }}" max="{{ $max }}"
    {{ $attributes->merge(['class' => 'border-green-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
