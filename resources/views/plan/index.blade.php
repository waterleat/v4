<x-layout>
    <x-slot:title>
        Index Plans page
    </x-slot:title>

    <div class=" mx-auto p-4 sm:p-6 lg:p-8">

    @php
        // $sorted = $plans->sortBy([
        //     ['sow_start', 'asc'],
        //     ['harvest_end', 'asc']
        // ]);
        // // $first = $sorted->first();
        // $active = $sorted->where('')
    @endphp
    
    <div class="mt-8 mx-auto p-4 sm:p-6 lg:p-8">
        <h4 class="text-2xl font-semibold">Sowing order</h4>

        @forelse ($sorted as $plan)
            <x-layout.index-cards class="!w-full">
                <div class="w-full">
                    <div class="flex">
                        <div class="w-32 text-gray-900 py-1 px-2  mr-2 hover:text-gray-700 hover:bg-green-100 transition-all">
                            <a href="{{ route('plan.show', ['plan'=>$plan->id]) }}">
                                <h2 class="text-xl font-bold">
                                    {{ $plan->succession->plantType->name }} 
                                </h2>
                            </a>
                        </div>

                        <div id="suc-{{ $loop->iteration }}" class="year "
                            data-el="<?= "canvas-sow-".$loop->iteration  ?>"
                            data-ss="{{ $today->diffInDays($plan->sow_start, false)+365 }}"
                            data-se="{{ $today->diffInDays($plan->sow_end, false)+365 }}"
                            data-ps="{{ $today->diffInDays($plan->plant_start, false)+365 }}"
                            data-pe="{{ $today->diffInDays($plan->plant_end, false)+365 }}"
                            data-hs="{{ $today->diffInDays($plan->harvest_start, false)+365 }}"
                            data-he="{{ $today->diffInDays($plan->harvest_end, false)+365 }}"
                            data-yd="{{ $doy }}">
                        </div>
                        <div id="plan-{{ $loop->iteration }}" class="w-80 h-8">
                            <canvas id="canvas-sow-{{ $loop->iteration }}" width="730" height="30" 
                                class="w-full h-full border border-gray-300">
                                Your browser does not support the HTML canvas tag.
                            </canvas>
                        </div>
                        <div class=" ml-4 flex justify-between">
                            <button class="bg-yellow-500 w-28 text-lg px-2 mr-4">
                                {{ $plan->status->name }}
                            </button>
                            <livewire:sow-seeds :pid="$plan->id" />
                            <p class="mr-4">at windowsill</p>
                            {{-- {{ $plan->locn_growing }} --}}
                            <div class="flex justify-between items-center">
                                <x-button.small href="{{ route('plan.edit', $plan->id) }}">
                                    Edit
                                </x-button.small>
                                <form action="{{ route('plan.destroy', $plan) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-4 px-3 text-white bg-red-500 rounded-full border border-black" type="submit">Delete</button>
                                </form>
                                <button type="button" class="bg-blue-400 px-2 ml-4 rounded">-1 Yr</button>
                                <button type="button" class="bg-blue-400 px-2 ml-4 rounded">+1 Yr</button>
                            </div>
                        </div>
                    </div>
                </div >
                
            </x-layout.index-cards>
        @empty
            No plans available
        @endforelse
    </div>


    <script type="text/javascript">
        const ht = 30
        const pos = 300
        const txt = "J F M A M J J A S O N D 2 F M A M J J A S O N D 3 F M A M J J A S O N D"

        const suclist = document.querySelectorAll(".year");

        suclist.forEach((yv) => {

            var el = yv.dataset.el
            var ss = yv.dataset.ss
            var se = yv.dataset.se
            var ps = yv.dataset.ps
            var pe = yv.dataset.pe
            var hs = yv.dataset.hs
            var he = yv.dataset.he

            var yd = Number(yv.dataset.yd)
            if (yd<pos) {yd = Number(yd)+365}

            
            var canvas = document.getElementById(el);
            var ctx = canvas.getContext("2d");
            
            ctx.translate(pos-yd, 0)
            
            ctx.beginPath()
            ctx.rect(ss, 0, se-ss, ht);
            ctx.fillStyle = 'orange';
            ctx.fill();
            ctx.closePath()

            ctx.beginPath()
            ctx.rect(ps, 0, pe-ps, ht);
            ctx.fillStyle = 'green';
            ctx.fill();
            ctx.closePath()
            
            ctx.beginPath()
            ctx.rect(hs, 0, he-hs, ht);
            ctx.fillStyle = 'purple';
            ctx.fill();
            ctx.closePath()

            ctx.font = "32px Arial";
            ctx.fillStyle = 'gray';
            ctx.fillText(txt, 6, 26);

            ctx.beginPath()
            ctx.rect(yd, 0, 2, ht);
            ctx.fillStyle = 'red';
            ctx.fill();
            ctx.closePath()
              
        });
    </script>

</x-layout>