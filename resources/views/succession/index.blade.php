<x-layout>
    <x-slot:title>
        Index Succession page
    </x-slot:title>

    <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">


        <div class="py-6 sm:py-10">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
            href="{{ route('succession.create') }}">New Succession</a>
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

        @foreach ( $successions as $succession )
        {{-- {{ dd($successionTypes->find($succession->succession_type_id)->name) }} --}}
        {{-- {{ dd($plantTypes->find($succession->plant_type_id)->name) }} --}}
            <div class="bg-white pt-4 rounded-lg drop-shadow-xl sm:basis-3/4 basis-full sm:mr-8 pb-4 sm:pb-0">
                <div class="w-11/12 mx-auto pb-4 flex">
                    <h2 class="text-gray-900 text-2xl font-bold pt-4 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                        <a href="{{ route('succession.show', ['succession'=>$succession]) }}">
                            {{ $successionTypes->find($succession->succession_type_id)->name }} - {{ $plantTypes->find($succession->plant_type_id)->name }}
                        </a>
                    </h2>
                    {{-- <div class="text-gray-900  p-0 hover:text-gray-700 transition-all">
                        <a href="{{ route('succession.show', ['succession'=>$succession]) }}">
                            <h2 class="text-2xl font-bold">{{ $plantTypes->find($succession->plant_type_id)->name }} </h2>
                            <p> {{ $plantTypes->find($succession->plant_type_id)->name }} </p>
                        </a>
                    </div > --}}

                    <a href="{{ route('succession.edit', $succession) }}" class="pl-4 block text-green-500 border-green-400 border-b-1 ">Edit</a>
                    <form action="{{ route('succession.destroy', $succession) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="pl-4 text-red-500" type="submit">Delete</button>
                    </form>
                </div>

            </div>
        @endforeach
    </div>
</x-layout>