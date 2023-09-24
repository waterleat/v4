<x-layout>
    <x-slot:title>
        Show variety page
    </x-slot:title>

    <div class="w-4/5 mx-auto">

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $variety->name }}
        </h2>
        <div class="bg-white p-8">
            <div class="">
                <h3 class="text-2xl">Info</h3>
                <p class="ml-8 py-2">{{ $variety->info }}</p>
                {{-- {{ dd($variety) }} --}}
                <h3 class="text-2xl">Plant Type:</h3>
                <p class="ml-8 py-2"> 
                    {{-- {{ dd($plantTypes->find($variety->plant_type_id)) }} --}}
                    @if ($variety->plant_type_id)
                        {{ $plantTypes->find($variety->plant_type_id)->name }}
                    @else
                        not known
                    @endif
                </p>
                <h3 class="text-2xl">Description</h3>
                <p class="ml-8 py-2">{{ $variety->description }}</p>
            </div>
            <div class="">
                <p>height {{ $variety->height }} m</p>
                <p>spread {{ $variety->spread }} m</p>
                <p>maturity {{ $variety->days2maturity }} days</p>
            </div>
        </div>


    </div>
</x-layout>