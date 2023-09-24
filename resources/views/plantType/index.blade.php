<x-layout>
    <x-slot:title>
        Index PlantType page
    </x-slot:title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="py-6 sm:py-10">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
            href="{{ route('plantType.create') }}">
                New PlantType
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

        @foreach ( $plantTypes as $plantType )
            <div class="mb-1 bg-white pt-4 rounded-lg drop-shadow-xl sm:basis-3/4 basis-full sm:mr-8 pb-4 sm:pb-0">
                <div class="w-11/12 mx-auto pb-4 flex justify-between">
                    <div class="text-gray-900  p-0 hover:text-gray-700 transition-all">
                        <a href="{{ route('plantType.show', ['plantType'=>$plantType]) }}">
                            <h2 class="text-2xl font-bold">{{ $plantType->name }} </h2>
                            <p> {{ $plantType->latin }} </p>
                        </a>
                    </div >

                    <div class="flex items-center">
                        <a href="{{ route('plantType.edit', $plantType) }}">
                            <button class="px-3 text-sm sm:text-base bg-green-400 shadow-xl rounded-full transition-all hover:bg-green-300">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form action="{{ route('plantType.destroy', $plantType) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="ml-4 px-3 text-red-500 rounded-full border border-red-500" type="submit">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</x-layout>