<h1>Edit Family {{ $family->name }}</h1>

<div class="m-auto pt-20">
    @if ($errors->any())
    <div class="pb-8">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Something went wrong ...
        </div>
        <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            @foreach ($errors as $error )
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif
    <form
        action="{{ route('family.update', $family->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input
        type="text"
        name="name"
        value="{{ $family->name }}"
        class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Family
        </button>
    </form>
</div>