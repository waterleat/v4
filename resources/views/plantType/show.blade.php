<x-layout>
    <x-slot:title>
        Show PlantType page
    </x-slot:title>

    <div class="w-4/5 mx-auto">

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $plantType->name }}
        </h2>

        <h3 class="text-2xl">Family:</h3>
        <p class="ml-8 py-2"> 
            @if ($plantType->family_id)
                {{ $family->name }}
            @else
                not known
            @endif
        </p>

        <h3 class="text-2xl">Varieties</h3>
        <ul class="ml-8 py-2">
            @forelse ( $plantType->varieties as $variety )
                <li>{{ $variety['name'] }}</li>
            @empty
                no varieties found
            @endforelse
        </ul>

        <h3 class="text-2xl">Successions</h3>
        <div class="ml-8 py-2">
            {{-- {{ dd($plantType->successions) }} --}}
            @forelse ( $plantType->successions as $succession )
                <div class="flex">
                    <p class="w-1/4">{{ $successionTypes->find($succession->succession_type_id)->name }}</p>
                    <p class="w-2/12 bg-green-400">{{ $succession->sow }}</p>
                    <p class="w-2/12 bg-orange-400">{{ $succession->plant }}</p>
                    <p class="w-2/12 bg-blue-400">{{ $succession->firstHarvest }}</p>
                    <p class="w-2/12 bg-red-400">{{ $succession->lastHarvest }}</p>
                </div>
            @empty
                no successions found
            @endforelse
        </div>
    </div>
</x-layout>