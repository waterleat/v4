<x-layout>
    <x-slot:title>
        Index Journal page
    </x-slot:title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="py-6 sm:py-10">
            <x-button.large href="{{ route('journal.create') }}">New Journal</x-button.large>
        </div>

        @forelse ($journals as $journal)
        @php
            $succession = $successions->find($journal->succession_id);
            $plantType = $plantTypes->find($succession->plant_type_id);
            $variety = $varieties->find($journal->variety_id);
        @endphp

            <x-layout.index-cards class="w-72">
                <div class="text-gray-900 py-1 px-2 w-full mr-8 hover:text-gray-700 hover:bg-green-100 transition-all">
                    <a href="{{ route('journal.show', ['journal'=>$journal->id]) }}">
                        <h2 class="text-xl font-bold">
                            {{ $journal->variety->name }} a {{ $journal->plan->succession->plantType->name }} sown on {{ date_format($journal->sown, 'd M Y') }}
                        </h2>
                    </a>
                </div >
                    
                
                <div class="flex items-center">
                    {{-- <a href="{{ route('plantType.edit', $plantType) }}">
                        <button class="px-3 text-sm sm:text-base bg-green-400 shadow-xl rounded-full transition-all hover:bg-green-300">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                        </button>
                    </a>

                    <form action="{{ route('plantType.destroy', $plantType) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="ml-4 px-3 text-red-500 rounded-full border border-red-500" type="submit">Delete</button>
                    </form> --}}
                </div>
            </x-layout.index-cards>
        @empty
            no journal entries
        @endforelse

        
        </div>
    </div>
</x-layout>