<x-layout>
    <x-slot:title>
        Index Plans page
    </x-slot:title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        @forelse ($plans as $plan)
        <x-layout.index-cards>
            <div class="text-gray-900 py-1 px-2 w-full mr-8 hover:text-gray-700 hover:bg-green-100 transition-all">
                <a href="{{ route('plan.show', ['plan'=>$plan->id]) }}">
                    <h2 class="text-xl font-bold">
                        {{ $plan->succession->plantType->name }} at {{ $plan->locn_growing }} 
                    </h2>
                </a>
            </div >
        </x-layout.index-cards>
        @empty
            No plans availible
        @endforelse

        
    </div>

</x-layout>