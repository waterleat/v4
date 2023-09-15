{{-- @props() --}}
{{-- {{ dd($attributes) }} --}}
{{-- {{ dd($options) }} --}}
{{-- {!! $attributes->merge(['class' => 'border-green-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} > --}}
{{-- <select   {!! $attributes->merge(['class' => 'border-green-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} >
    <option>--Pick plant family--</option>
    @foreach ( $options as $option )
    {{ dd($option)}}
    <option value="{{ $option[0] }}" >{{ $option[1] }}</option>
    @endforeach
</select> --}}

<select  
{{-- {{ $attributes->class->merge(['class' => 'text-red-500']) }}> --}}
{{-- {!! $attributes->merge(["class" => 'border-green-300'] ) !!} >  --}}
    class="border-green-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
    <option>--Pick plant family--</option>
    @foreach ( $options as $key => $value )
        <option value="{{ $key }}" >{{ $value }}</option>
    @endforeach
</select>