<x-layout>
    <x-slot:title>
        Show PlantType page
    </x-slot:title>

    <div class=" mx-10 pb-20">
        <div class="flex">
            <div class="w-28 pt-3 pl-3">
                <img src="{{ asset('storage/'.$plantType->plant_type_img) }}" alt="plant icon">
            </div>
            <div class="flex w-full">
                <h2 class="w-3/5 text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ">
                    {{ $plantType->name }}
                </h2>
                <div class="w-2/5 pt-10">
                    <div class="flex mb-2">
                        <h3 class="text-2xl w-32">Latin:</h3>
                        <p class="my-auto">{{ $plantType->latin }}</p>
                    </div>

                    <div class="flex mb-2">
                        <h3 class="text-2xl w-32">Family:</h3>
                        <p class="my-auto"> 
                            @if ($plantType->family_id)
                                <x-button.small href="{{ route('family.show', ['family'=>$plantType->family_id]) }}">
                                    {{ $family->name }}
                                </x-button.small>
                            @else
                            Not known
                            @endif
                        </p>
                    </div>

                    <div class="flex mb-2">
                        <h3 class="text-2xl w-32">Varieties:</h3>
                        <ul class="my-auto">
                            @forelse ( $plantType->varieties as $variety )
                            <li class="mb-2">
                                <x-button.small href="{{ route('variety.show', ['variety'=>$variety]) }}">
                                    {{ $variety['name'] }}
                                </x-button.small>
                            </li>
                            @empty
                                No varieties found
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <h3 class="text-2xl">Successions</h3>

            <table class="w-full py-2">
                <tbody>
                    @forelse ( $plantType->successions as $succession )
                    <tr>
                        <td  class="mb-4 border-b border-red-600 hover:text-gray-700 hover:bg-green-300 transition-all">
                            <a href="{{ route('succession.show', $succession) }}" >
                                {{ $successionTypes->find($succession->succession_type_id)->name }}</a></td>
                        <td  class="">
                            @if ( $succession->cd )
                                CD
                            @endif
                        </td>
                        <td >
                            <div id="suc-{{ $loop->iteration }}" class="year flex"
                                data-el="<?= "canvas-".$loop->iteration  ?>"
                                data-ss="{{ $succession->sow_start }}"
                                data-se="{{ $succession->sow_end }}"
                                data-ps="{{ $succession->plant_start }}"
                                data-pe="{{ $succession->plant_end }}"
                                data-hs="{{ $succession->harvest_start }}"
                                data-he="{{ $succession->harvest_end }}"
                                data-yd="{{ getdate()['yday'] }}">
                            </div>
                            <div id="plan-{{ $loop->iteration }}" class="w-full h-8">
                                <canvas id="canvas-{{ $loop->iteration }}" width="365" height="30" 
                                    class="w-full h-full border border-gray-300">
                                    Your browser does not support the HTML canvas tag.
                                </canvas>
                            </div>
                        </td>
                        <td >
                            <div class="w-24 ml-4 items-center">
                                <livewire:create-plan :sid="$succession->id" />
                            </div>
                        </td>
                        <td  class="max-w-xl">
                            {{ $succession->varieties_recommended }}
                        </td>
                    </tr>
                    <tr><td><div class="h-4"></div></td></tr>


                    @empty
                        No successions found
                    @endforelse
                    <tr class="h-4"></tr>
                </tbody>
            </table>
            
            <div>
                <div class="text-xl ">Best dates</div>
                <div class="flex px-8">
                    <div class="w-20 font-semibold">Sowing</div>
                    <div class="mr-4">{{ $plantType->dates_best_sow }}</div>
                    <div class="w-20 font-semibold">Harvest</div>
                    <div class="mr-4">{{ $plantType->dates_main_harvest }}</div>
                    <div></div>
                </div>
            </div>


        </div>
        

        <h3 class="text-2xl pt-6">Info</h3>
        
        <div class="flex">
            <div class="w-1/2">
                <table>
                    <tbody>
                        <tr>
                            <td><h4 class="text-lg w-36">Germination</h4></td>
                            <td>
                                @if ($plantType->germ_temp_img)
                                <img src="{{ asset('storage/'.$plantType->germ_temp_img) }}" alt="germination temperature graph" class="pr-8">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-36">Multisow</h4></td>
                            <td><p class="">{{ $plantType->multisow }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-36">Hardiness</h4></td>
                            <td><p class="">{{ $plantType->hardiness_young_plants }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-36">Root depth</h4></td>
                            <td><p class="">{{ $plantType->root_depth }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-36">Interplant into</h4></td>
                            <td><p class="">{{ $plantType->interplant_into }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-36">Interplant with</h4></td>
                            <td><p class="">{{ $plantType->interplant_with }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-36">Relay into</h4></td>
                            <td><p class="">{{ $plantType->relay_plant_into }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-36">Relay with</h4></td>
                            <td><p class="">{{ $plantType->relay_plant_with }}</p></td>
                        </tr>
                        <tr>
                            <td>Perennial</td>
                            <td>{{ ($plantType->perennial) ? "Yes" : "No" }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="w-1/2">
                <table>
                    <tbody>
                        <tr>
                            <td><h4 class="text-lg w-48">Mulch</h4></td>
                            <td><p class="">{{ $plantType->mulch }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-48">Feeder type</h4></td>
                            <td><p class="">{{ $plantType->feeder_type }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-48">Fertiliser</h4></td>
                            <td><p class="">{{ $plantType->fertiliser }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-48">When to fertilise</h4></td>
                            <td><p class="">{{ $plantType->when_to_fertilise }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-48">Competitor</h4></td>
                            <td><p class="">{{ $plantType->competitor }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-48">Competition period</h4></td>
                            <td><p class="">{{ $plantType->competition_period }}</p></td>
                        </tr>
                        <tr>
                            <td><h4 class="text-lg w-48">companions</h4></td>
                            <td><p class="">{{ $plantType->companions }}</p>
                        </tr>
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>
        
            
            
            
            
        
            




    <script type="text/javascript">
        const ht = 30
        // const yv = document.querySelector("#yearview")
        // const plan = document.querySelector("#plan")
        const suclist = document.querySelectorAll(".year");

        suclist.forEach((yv) => {

            var el = yv.dataset.el
            var ss = yv.dataset.ss
            var se = yv.dataset.se
            var ps = yv.dataset.ps
            var pe = yv.dataset.pe
            var hs = yv.dataset.hs
            var he = yv.dataset.he
            var yd = yv.dataset.yd

            if (ps>365) {ps=ps-365}
            if (pe>365) {pe=pe-365}
            if (hs>365) {hs=hs-365}
            if (he>365) {he=he-365}
            
            var canvas = document.getElementById(el);
            var context = canvas.getContext("2d");
            
            context.beginPath()
            context.rect(ss, 0, se-ss, ht);
            context.fillStyle = 'orange';
            context.fill();
            context.closePath()

            context.beginPath()
            context.rect(ps, 0, pe-ps, ht);
            context.fillStyle = 'olivedrab';
            context.fill();
            context.closePath()
            
            if (he-hs<0) {
                context.beginPath()
                context.rect(hs, 0, 365-hs, ht);
                context.fillStyle = 'darkorchid';
                context.fill();
                context.closePath()
                context.beginPath()
                context.rect(0, 0, he, ht);
                context.fillStyle = 'darkorchid';
                context.fill();
                context.closePath()
            }else{
                context.beginPath()
                context.rect(hs, 0, he-hs, ht);
                context.fillStyle = 'darkorchid';
                context.fill();
                context.closePath()
            }

            context.font = "32px Arial";
            context.fillStyle = 'darkgray';
            context.fillText("J F M A M J J A S O N D", 6, 
            26);

            context.beginPath()
            context.rect(yd, 0, 1, ht);
            context.fillStyle = 'blue';
            context.fill();
            context.closePath()
              
        });
    </script>



</x-layout>