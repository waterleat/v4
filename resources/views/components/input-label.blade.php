@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-gray-700 text-2xl']) }}>
    {{ $value ?? $slot }}
</label>
