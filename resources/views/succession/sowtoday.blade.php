<x-layout>
    <x-slot:title>
        Sowings Today
    </x-slot:title>

    <div class=" mx-6 pb-20">
        <div class="flex">
            <h2 class="w-4/5 text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ">
                {{-- {{ $plantType->name }} --}}
                Successions to sow today
            </h2>
        </div>

        <table class="w-full py-2">


            @forelse ( $sowings as $succession )
            <tr>
                <td rowspan="2" class=" border-b border-red-600 hover:text-gray-700 hover:bg-green-300 transition-all">
                    {{-- <a href="{{ route('succession.show', $succession) }}" > --}}
                        <h4 class="text-lg font-semibold">{{ $plantTypes->find($succession->plant_type_id)->name }}</h4>
                        <p>{{ $successionTypes->find($succession->succession_type_id)->name }}</p>
                    {{-- </a> --}}
                </td>
                <td rowspan="2" class="">
                    @if ( $succession->cd )
                        CD
                    @endif
                </td>
                <td class="bg-green-400 px-2">{{ $succession->sow }}</td>
                <td class="bg-orange-400 px-2">{{ $succession->plant }}</td>
                <td class="bg-blue-400 px-2">{{ $succession->first_harvest }}</td>
                <td class="bg-red-400 px-2">{{ $succession->last_harvest }}</td>
                <td rowspan="2" class="">{{ $succession->varieties_recommended }}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="suc-{{ $loop->iteration }}" class="year flex"
                        data-el="<?= "canvas-".$loop->iteration  ?>"
                        data-ss="<?= htmlspecialchars($succession->sow_start) ?>"
                        data-se="<?= htmlspecialchars($succession->sow_end) ?>"
                        data-ps="<?= htmlspecialchars($succession->plant_start) ?>"
                        data-pe="<?= htmlspecialchars($succession->plant_end) ?>"
                        data-hs="<?= htmlspecialchars($succession->harvest_start) ?>"
                        data-he="<?= htmlspecialchars($succession->harvest_end) ?>"
                        data-yd="{{ getdate()['yday'] }}">
                    </div>
                    <div id="plan-{{ $loop->iteration }}" class="w-full h-8">
                        <canvas id="canvas-{{ $loop->iteration }}"  style="border:1px solid #d3d3d3;" class="w-full h-full" width="365" height="30">
                            Your browser does not support the HTML canvas tag.
                        </canvas>
                    </div>
                </td>
                <td rowspan="2" class="">
                    <a class="primary-btn inline text-base  bg-green-500 py-1 px-2 shadow-xl rounded-full transition-all hover:bg-green-400" 
                        href="{{ route('succession.show', $succession->id) }}">Show succession</a>
                    <a class="primary-btn inline text-base  bg-green-500 py-1 px-2 shadow-xl rounded-full transition-all hover:bg-green-400" 
                        href="{{ route('plantType.show', $succession->plant_type_id) }}">Show plant type</a>
                    <a class="primary-btn inline text-base  bg-green-500 py-1 px-2 shadow-xl rounded-full transition-all hover:bg-green-400" 
                        href="{{ route('journal.newSowing', $succession->id) }}">Create journal entry</a>
                </td>
            </tr>
            @empty
            No successions found
            @endforelse
        </table>



    </div>

    <script type="text/javascript">
        const ht = 30
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
            
            var canvas = document.getElementById(el);
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
            context.fillText("J F M A M J J A S O N D", 6, 
            26);

            context.beginPath()
            context.rect(yd, 0, 1, ht);
            context.fillStyle = 'red';
            context.fill();
            context.closePath()
              
        });
    </script>

</x-layout>
