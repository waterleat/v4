<x-layout>
    <x-slot:title>
        Index Plans page
    </x-slot:title>

    <div class=" mx-auto p-4 sm:p-6 lg:p-8">
        <div class="flex flex-wrap">
            @forelse ($plans as $plan)
            <x-layout.index-cards class="w-5/12">
                <div class="w-full">
                    <div class="">
                        <div class=" text-gray-900 py-1 px-2  mr-8 hover:text-gray-700 hover:bg-green-100 transition-all">
                            <a href="{{ route('plan.show', ['plan'=>$plan->id]) }}">
                                <h2 class="text-xl font-bold">
                                    {{ $plan->succession->plantType->name }} at {{ $plan->locn_growing }} 
                                </h2>
                            </a>
                        </div>
                        <div id="suc-{{ $loop->iteration }}" class="year flex"
                            data-el="<?= "canvas-".$loop->iteration  ?>"
                            data-ss="{{ $plan->succession->sow_start }}"
                            data-se="{{ $plan->succession->sow_end }}"
                            data-ps="{{ $plan->succession->plant_start }}"
                            data-pe="{{ $plan->succession->plant_end }}"
                            data-hs="{{ $plan->succession->harvest_start }}"
                            data-he="{{ $plan->succession->harvest_end }}"
                            data-yd="{{ getdate()['yday'] }}">
                        </div>
                        <div id="plan-{{ $loop->iteration }}" class="max:w-2xl h-8">
                            <canvas id="canvas-{{ $loop->iteration }}" width="365" height="30" 
                                class="w-full h-full border border-gray-300">
                                Your browser does not support the HTML canvas tag.
                            </canvas>
                        </div>
                        <div class="mt-4 mx-4 flex justify-between">
                            <x-button.small href="{{ route('plan.edit', $plan) }}">
                                Edit
                            </x-button.small>
                            <form action="{{ route('plan.destroy', $plan) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="ml-4 px-3 text-red-500 rounded-full border border-red-500" type="submit">Delete</button>
                            </form>
                            <div class="bg-yellow-500 text-lg px-2">
                                {{ $plan->status->name }}
                            </div>
                        </div>
                    </div>
                </div >
                
            </x-layout.index-cards>
            @empty
                No plans available
            @endforelse
        </div>
        
    </div>


    <div class="mt-8 mx-auto p-4 sm:p-6 lg:p-8">
        <h4 class="text-2xl font-semibold">Sowing order</h4>
        @forelse ($plans as $plan)
        <x-layout.index-cards class="!w-1/2">
            <div class="w-full">
                <div class="">
                    <div class=" text-gray-900 py-1 px-2  mr-8 hover:text-gray-700 hover:bg-green-100 transition-all">
                        <a href="{{ route('plan.show', ['plan'=>$plan->id]) }}">
                            <h2 class="text-xl font-bold">
                                {{ $plan->succession->plantType->name }} at {{ $plan->locn_growing }} 
                            </h2>
                        </a>
                    </div>
                    <div id="suc-{{ $loop->iteration }}" class="year flex"
                        data-el="<?= "canvas-sow-".$loop->iteration  ?>"
                        data-ss="{{ $plan->succession->sow_start }}"
                        data-se="{{ $plan->succession->sow_end }}"
                        data-ps="{{ $plan->succession->plant_start }}"
                        data-pe="{{ $plan->succession->plant_end }}"
                        data-hs="{{ $plan->succession->harvest_start }}"
                        data-he="{{ $plan->succession->harvest_end }}"
                        data-yd="{{ getdate()['yday'] }}">
                    </div>
                    <div id="plan-{{ $loop->iteration }}" class="max:w-2xl h-8">
                        <canvas id="canvas-sow-{{ $loop->iteration }}" width="365" height="30" 
                            class="w-full h-full border border-gray-300">
                            Your browser does not support the HTML canvas tag.
                        </canvas>
                    </div>
                    <div class="mt-4 mx-4 flex justify-between">
                        <x-button.small href="{{ route('plan.edit', $plan->succession->id) }}">
                            Edit the plan
                        </x-button.small>
                        <form action="{{ route('plan.destroy', $plan) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="ml-4 px-3 text-red-500 rounded-full border border-red-500" type="submit">Delete</button>
                        </form>
                        <p class="bg-yellow-500 text-lg px-2">
                            {{ $plan->status->name }}
                        </p>
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
            context.fillStyle = 'green';
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
            context.fillStyle = 'black';
            context.fill();
            context.closePath()
              
        });
    </script>

</x-layout>