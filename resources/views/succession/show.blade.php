<x-layout>
    <x-slot:title>
        Show succession page
    </x-slot:title>

    <div class="w-4/5 mx-auto">
        {{-- {{ dd($succession) }} --}}

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $successionTypes->find($succession->succession_type_id)->name }} -- {{ $plantTypes->find($succession->plant_type_id)->name }}
        </h2>
        <div class="bg-white p-8">
            <div class="">
                <h3 class="text-2xl">sow</h3>
                <p class="ml-8 py-2">{{ $succession->sow }}</p>

                <h3 class="text-2xl">Plant :</h3>
                <p class="ml-8 py-2">{{ $succession->plant }}</p>

                <h3 class="text-2xl">first Harvest :</h3>
                <p class="ml-8 py-2">{{ $succession->firstHarvest }}</p>

                <h3 class="text-2xl">Last Harvest :</h3>
                <p class="ml-8 py-2">{{ $succession->lastHarvest }}</p>

                {{-- <p class="ml-8 py-2">  --}}
                    {{-- {{ dd($plantTypes->find($variety->plant_type_id)) }}
                    @if ($variety->plant_type_id)
                        {{ $plantTypes->find($variety->plant_type_id)->name }}
                    @else
                        not known
                    @endif
                </p> --}}

                {{-- <h3 class="text-2xl">Description</h3>
                <p class="ml-8 py-2">{{ $variety->description }}</p> --}}
            </div>
            <div class="">
                <h3 class="text-2xl">Plant :</h3>
                <h3 class="text-2xl">Plant :</h3>
                <h3 class="text-2xl">Plant :</h3>
                <h3 class="text-2xl">Plant :</h3>
                <h3 class="text-2xl">Plant :</h3>

                <p>height {{ $variety->height }} m</p>
                <p>spread {{ $variety->spread }} m</p>
                <p>maturity {{ $variety->days2maturity }} days</p>
            </div>
        </div>


    </div>
</x-layout>