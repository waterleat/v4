<x-layout>
    <x-slot:title>
        Show variety page
    </x-slot:title>

    <div class="w-4/5 mx-auto">

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $variety->name }}
        </h2>
        <div class="bg-white p-8 flex">
            <div class="w-1/2">
                <h2 class="text-3xl font-bold mb-8">Variety</h2>
                <div class="">
                    <h3 class="text-2xl">Info</h3>
                    <p class="ml-8 py-2">{{ $variety->info }}</p>
                    {{-- {{ dd($variety) }} --}}
                    
                    <h3 class="text-2xl">Description</h3>
                    <p class="ml-8 py-2">{{ $variety->description }}</p>
                </div>
                <div class="">
                    <p>height {{ $variety->height }} m</p>
                    <p>spread {{ $variety->spread }} m</p>
                    <p>maturity {{ $variety->days2maturity }} days</p>
                </div>

                <div class="my-4">
                    @if ($variety->sow_direct)
                        <p>Direct sown: Yes</p>
                    @endif
                    <p>Multisow: {{ $variety->multi }}</p>
                    <p>Spacing: {{ $variety->spacing }} "</p>
                </div>
                <div class="my-4">
                    <p>Sowing: {{ $variety->sowing }}</p>
                    <p>Harvest: {{ $variety->harvest }}</p>
                    <p>Store: {{ $variety->store }}</p>
                </div>
            </div>
            <div class="w-1/2">
                
                <h2 class="text-3xl font-bold mb-8">Plant type
                    <span class="text-xl pl-4"> 
                        {{-- {{ dd($plantTypes->find($variety->plant_type_id)) }} --}}
                        @if ($variety->plant_type_id)
                            {{ $plantType->name }}
                        @else
                            not known
                        @endif
                    </span>
                </h2>
                {{-- <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
                    {{ $family->name }}
                </h2>
                <h3 class="text-2xl">Latin name</h3>
                <p class="ml-8 py-2">{{ $family->latin }}</p>
        
                <h3 class="text-2xl">Description</h3>
                <p class="ml-8 py-2">{{ $family->description }}</p>
        
                <h3 class="text-2xl">Plant types</h3>
                <ul class="ml-8 py-2">
        
                    @forelse ( $family->plantTypes as $plantType )
                        <li>{{ $plantType['name'] }}</li>
                    @empty
                        no plant types found
                    @endforelse
                </ul> --}}
                <table>
                    <tbody>
                        <tr>
                            <td class="border"><h4 class="text-lg w-36">Multisow</h4></td>
                            <td class="border"><p class="">{{ $plantType->multisow }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-36">Hardiness</h4></td>
                            <td class="border"><p class="">{{ $plantType->hardiness_young_plants }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-36">Root depth</h4></td>
                            <td class="border"><p class="">{{ $plantType->root_depth }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-36">Interplant into</h4></td>
                            <td class="border"><p class="">{{ $plantType->interplant_into }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-36">Interplant with</h4></td>
                            <td class="border"><p class="">{{ $plantType->interplant_with }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-36">Relay into</h4></td>
                            <td class="border"><p class="">{{ $plantType->relay_plant_into }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-36">Relay with</h4></td>
                            <td class="border"><p class="">{{ $plantType->relay_plant_with }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-48">Mulch</h4></td>
                            <td class="border"><p class="">{{ $plantType->mulch }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-48">Feeder type</h4></td>
                            <td class="border"><p class="">{{ $plantType->feeder_type }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-48">Fertiliser</h4></td>
                            <td class="border"><p class="">{{ $plantType->fertiliser }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-48">When to fertilise</h4></td>
                            <td class="border"><p class="">{{ $plantType->when_to_fertilise }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-48">Competitor</h4></td>
                            <td class="border"><p class="">{{ $plantType->competitor }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-48">Competition period</h4></td>
                            <td class="border"><p class="">{{ $plantType->competition_period }}</p></td>
                        </tr>
                        <tr>
                            <td class="border"><h4 class="text-lg w-48">companions</h4></td>
                            <td class="border"><p class="">{{ $plantType->companions }}</p>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</x-layout>