{{-- {{ dd($attributes) }} --}}
{{-- {{ dd($options) }} --}}
<select class="border border-green-300">
{{-- {!! $attributes->merge(["class" => 'border-green-300'] ) !!} > --}}
    {{-- {!! $attributes->merge(['class' => 'border-green-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} > --}}
    <option>--Pick plant family--</option>
    @foreach ( $options as $key => $value )
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>