<x-layout>
    <x-slot:title>
        Index Succession page
    </x-slot:title>

    <div class="w-4/5 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="flex justify-between">
            <div class="py-6 sm:py-10">
                <x-button.large href="{{ route('succession.create') }}">New Succession</x-button.large>
            </div>
            <div class="py-6 sm:py-10">
                <x-button.large href="{{ route('succession.sowtoday') }}">What to sow today</x-button.large>
            </div>
    
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

        <div class="flex flex-wrap justify-between">
            @foreach ( $successions as $succession )
            <x-layout.index-cards class="w-72">
                <div class="text-gray-900 py-1 px-2 w-full mr-8 hover:text-gray-700 hover:bg-green-100 transition-all">
                    <a href="{{ route('succession.show', ['succession'=>$succession]) }}">
                        <h2 class="text-xl font-bold">{{  $successionTypes->find($succession->succession_type_id)->name  }} - 
                            <span class="text-2xl font-bold">{{ $plantTypes->find($succession->plant_type_id)->name }}</span>
                        </h2>
                    </a>
                </div>

                <div class="flex items-center">
                    <a href="{{ route('succession.edit', $succession) }}" >
                        <button class="px-3 text-sm sm:text-base bg-green-400 shadow-xl rounded-full transition-all hover:bg-green-300">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                        </button>
                    </a>
                    
                    <form action="{{ route('succession.destroy', $succession) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="ml-4 px-3 text-red-500 rounded-full border border-red-500" type="submit">Delete</button>
                    </form>
                </div>
            </x-layout.index-cards>
            @endforeach
        </div>
    </div>
</x-layout>