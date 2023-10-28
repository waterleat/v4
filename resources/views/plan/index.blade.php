<x-layout>
    <x-slot:title>
        Index PlantType page
    </x-slot:title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        @forelse ($plans as $plan)
            some
        @empty
            No plans availible
        @endforelse

        
    </div>

</x-layout>