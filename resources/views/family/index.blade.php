<h1>family.index page</h1>

<p>this link needs individual routes 
<a href= {{ route('family.show', ['id' => 1]) }}>item 1</a></p>

<div class="py-10 sm:py-20">
    <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
       href="{{ route('family.create') }}">
        New Family
    </a>
</div>

@if (session()->has('message'))
    <div>
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Warning!
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            {{ session()->get('message') }}
        </div>
    </div>
@endif

@foreach ( $families as $family )
    <div class="bg-white pt-4 rounded-lg drop-shadow-xl sm:basis-3/4 basis-full sm:mr-8 pb-4 sm:pb-0">
        <div class="w-11/12 mx-auto pb-4">
            <h2 class="text-gray-900 text-2xl font-bold pt-4 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                <a href="{{ route('family.show', $family->id) }}">
                    {{ $family->name }}
                </a>
            </h2>

            <a href="{{ route('family.edit', $family->id) }}" class=" block text-green-500 border-green-400 border-b-1 ">Edit</a>
            <form action="{{ route('family.destroy', $family->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="pt-3 pr-3 text-red-500" type="submit">Delete</button>
            </form>
        </div>

    </div>
@endforeach