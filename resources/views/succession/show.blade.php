<x-layout>
    <x-slot:title>
        Show succession page
    </x-slot:title>

    <div class="w-4/5 mx-auto">
        {{-- {{  }}"($succession) }} --}}

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $successionTypes->find($succession->succession_type_id)->name }} -- {{ $plantTypes->find($succession->plant_type_id)->name }}
        </h2>

        
        <div id="yearview"
            data-ss="{{ $succession->sow_start }}"
            data-se="{{ $succession->sow_end }}"
            data-ps="{{ $succession->plant_start }}"
            data-pe="{{ $succession->plant_end }}"
            data-hs="{{ $succession->harvest_start }}"
            data-he="{{ $succession->harvest_end }}"
            data-yd="{{ getdate()['yday'] }}">
        </div>


        <div class="bg-white p-8">
            <div class="flex">
                <div class="w-1/4">
                    <h3 class="text-lg md:text-xl lg:text-2xl">Sow</h3>
                    <p class="">{{ $succession->sow }}</p>
                    <p><?php echo(new DateTime('2022-12-31'))->add(new DateInterval('P'.$succession->sow_start.'D'))->format('dM'); ?></p>
                    <p><?php echo(new DateTime('2022-12-31'))->add(new DateInterval('P'.$succession->sow_end.'D'))->format('dM'); ?></p>
                </div>
                <div class="w-1/4">
                    <h3 class="text-lg md:text-xl lg:text-2xl">Plant</h3>
                    <p class="">{{ $succession->plant }}</p>
                    {{-- <p><?php //$datess = new DateTime('2022-12-31');
                        // $datess->add(new DateInterval('P'.$succession->plant_start.'D')); 
                        // echo($datess->format('dM')); ?>
                    </p> --}}
                    <p><?php echo(new DateTime('2022-12-31'))->add(new DateInterval('P'.$succession->plant_start.'D'))->format('dM'); ?></p>
                    <p><?php echo(new DateTime('2022-12-31'))->add(new DateInterval('P'.$succession->plant_end.'D'))->format('dM'); ?></p>
                    
                </div>
                <div class="w-1/4">
                    <h3 class="text-lg md:text-xl lg:text-2xl">first Harvest</h3>
                    <p class="">{{ $succession->first_harvest }}</p>
                    <p><?php echo(new DateTime('2022-12-31'))->add(new DateInterval('P'.$succession->harvest_start.'D'))->format('dM'); ?></p>
                    <p><?php echo(new DateTime('2022-12-31'))->add(new DateInterval('P'.$succession->harvest_end.'D'))->format('dM'); ?></p>
                </div>
                <div class="w-1/4">
                    <h3 class="text-lg md:text-xl lg:text-2xl">Last Harvest</h3>
                    <p class="">{{ $succession->last_harvest }}</p>
                </div>
            </div>



            <div id="plan" class="w-full h-12">
                <canvas id="canvas"  style="border:1px solid #d3d3d3;" class="w-full h-full" width="365" height="48">
                    Your browser does not support the HTML canvas tag.
                </canvas>
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




            <div class="pt-6">
                @if ($succession->cd)
                    <h3 class="text-2xl ">CD_recommended : YES</h3>
                @endif  
                <h3 class="text-2xl">start seeds :</h3>
                <p class="">{{ $succession->start_seeds }}</p>
                <h3 class="text-2xl">grow seedlings :</h3>
                <p class="">{{ $succession->grow_seedlings }}</p>
                <h3 class="text-2xl">planting density :</h3>
                <p class="">{{ $succession->planting_density }}</p>
                <h3 class="text-2xl">growing notes :</h3>
                <p class="">{{ $succession->growing_notes }}</p>
                <h3 class="text-2xl">yield_notes :</h3>
                <p class="">{{ $succession->yield_notes }}</p>
                <h3 class="text-2xl">variety notes :</h3>
                <p class="">{{ $succession->variety_notes }}</p>
                <h3 class="text-2xl">varieties recommended :</h3>
                <p class="">{{ $succession->varieties_recommended }}</p>
            </div>
        </div>


    </div>
</x-layout>