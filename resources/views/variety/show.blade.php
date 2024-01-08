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
                <div class="flex">
                    <h2 class="text-3xl font-bold mb-8">Plant type</h2>
                    <div class="text-xl pl-4"> 
                        @if ($variety->plant_type_id)
                            <x-button.small href="{{ route('plantType.show', ['plantType'=>$plantType]) }}">
                                {{ $plantType->name }}
                            </x-button.small>
                        @else
                            not known
                        @endif
                    </div>
                </div>
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
                            <td class="border"><h4 class="text-lg w-36">Perennial</h4></td>
                            <td class="border"><p class="">{{ ($plantType->perennial) ? "Yes" : "No" }}</p></td>
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

        <div class="flex mt-4 bg-white p-8 ">
            <h3 class="text-2xl w-32">Journal Entries:</h3>
            <div class="my-auto w-full ">
                @forelse ( $variety->journals as $journal )
                <div class="flex">
                    <div class="w-full">
                        <div id="yearview"
                            data-ss="{{ $journal->plan->succession->sow_start }}"
                            data-se="{{ $journal->plan->succession->sow_end }}"
                            data-ps="{{ $journal->plan->succession->plant_start }}"
                            data-pe="{{ $journal->plan->succession->plant_end }}"
                            data-hs="{{ $journal->plan->succession->harvest_start }}"
                            data-he="{{ $journal->plan->succession->harvest_end }}"
                            data-yd="{{ getdate()['yday'] }}">
                        </div>
                        
                        <div id="plan" class=" h-12">
                            <canvas id="canvas"  style="border:1px solid #d3d3d3;" class="w-full h-full" width="365" height="48">
                                Your browser does not support the HTML canvas tag.
                            </canvas>
                        </div>
                    </div>
                </div>
                
                <div class="flex w-full">
                    <div class="w-1/4">
                        <h3 class="text-lg md:text-xl lg:text-2xl">Sown</h3>
                        <div>{{ $journal->sown->format('d M Y') }}</div>

                        {{-- <p class="">{{ $journal->sown }}</p> --}}
                        {{-- <p>{{ (new DateTime('2022-12-31'))->add(new DateInterval($journal->plan->sow_start))->format('dM') }}</p>
                        <p>{{ (new DateTime('2022-12-31'))->add(new DateInterval($journal->plan->sow_end))->format('dM') }}</p> --}}
                    </div>
                    <div class="w-1/4">
                        <h3 class="text-lg md:text-xl lg:text-2xl">Plant</h3>
                        <p class="{{ ($journal->planted) ? : "bg-blue-300" }}">
                            {{ ($journal->planted) ? $journal->planted->format('d M Y') : $journal->estimatedCropingDate($journal->plan->succession->days_nursery) }}
                        </p>
                        
                        {{-- <p class="">{{ $journal->succession->plant }}</p> --}}
                        {{-- <p><?php //$datess = new DateTime('2022-12-31');
                            // $datess->add(new DateInterval('P'.$journal->succession->plant_start.'D')); 
                            // echo($datess->format('dM')); ?>
                        </p> --}}
                        {{-- <p>{{ (new DateTime('2022-12-31'))->add(new DateInterval($journal->succession->plant_start))->format('dM') }}</p>
                        <p>{{ (new DateTime('2022-12-31'))->add(new DateInterval($journal->succession->plant_end))->format('dM') }}</p> --}}
                        
                    </div>
                    <div class="w-1/4">
                        <h3 class="text-lg md:text-xl lg:text-2xl">first Harvest</h3>
                        <p class="{{ ($journal->plan->first_harvest) ? : "bg-blue-300" }}">
                            {{ ($journal->first_harvest) ? $journal->first_harvest->format('d M'): $journal->estimatedCropingDate($journal->plan->succession->days_maturity) }}</p>
                        {{-- <p class="">{{ $journal->succession->first_harvest }}</p> --}}
                        {{-- <p>{{ (new DateTime('2022-12-31'))->add(new DateInterval($journal->succession->harvest_start))->format('dM') }}</p>
                        <p>{{ (new DateTime('2022-12-31'))->add(new DateInterval($journal->succession->harvest_end))->format('dM') }}</p> --}}
                    </div>
                    <div class="w-1/4">
                        <h3 class="text-lg md:text-xl lg:text-2xl">Last Harvest</h3>
                        <p class="{{ ($journal->last_harvest) ? : "bg-blue-300" }}">
                            {{ ($journal->last_harvest) ? $journal->last_harvest->format('d M'): $journal->estimatedCropingDate($journal->plan->succession->days_maturity + $journal->plan->succession->days_harvest) }}</p>
                        {{-- <p class="">{{ $journal->succession->last_harvest }}</p>
                        <p class="">{{ $journal->succession->first_harvest }}</p> --}}
                    </div>
                </div>
                @empty
                    No journals found
                @endforelse
            </ul>
        </div>


        <script type="text/javascript">
            const ht = 48
            const yv = document.querySelector("#yearview")
            const yd = yv.dataset.yd
            var ss = yv.dataset.ss
            var se = yv.dataset.se
            var ps = yv.dataset.ps
            var pe = yv.dataset.pe
            var hs = yv.dataset.hs
            var he = yv.dataset.he

            window.onload = function() {
                var canvas = document.getElementById("canvas");
                var context = canvas.getContext("2d");
                
                context.beginPath()
                context.rect(ss, 0, se-ss, ht);
                context.fillStyle = 'green';
                context.fill();
                context.closePath()

                context.beginPath()
                context.rect(ps, 0, pe-ps, ht);
                context.fillStyle = 'orange';
                context.fill();
                context.closePath()
                
                if (he-hs<0) {
                    context.beginPath()
                    context.rect(hs, 0, 365-hs, ht);
                    context.fillStyle = 'purple';
                    context.fill();
                    context.closePath()
                    context.beginPath()
                    context.rect(0, 0, he, ht);
                    context.fillStyle = 'purple';
                    context.fill();
                    context.closePath()
                }else{
                    context.beginPath()
                    context.rect(hs, 0, he-hs, ht);
                    context.fillStyle = 'purple';
                    context.fill();
                    context.closePath()
                }

                context.font = "32px Arial";
                context.fillStyle = 'gray';
                context.fillText("J F M A M J J A S O N D", 6, 36);

                context.beginPath()
                context.rect(yd, 0, 1, ht);
                context.fillStyle = 'red';
                context.fill();
                context.closePath()
            }
        </script>

    </div>
</x-layout>