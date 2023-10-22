@props(['disabled' => false,
'value' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} 
    {{ $attributes->merge(['class' => 'border-green-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>{{ $value }}</textarea>
