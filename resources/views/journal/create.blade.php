<x-layout>
    <x-slot:title>
        Create Journal page
    </x-slot:title>

    <div class=" p-4 sm:p-6 lg:p-8">
        
        <div class="m-auto py-8">
            @if ($errors->any())
            <div class="pb-8">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Something went wrong ...
                </div>
                <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $message )
                        <li> {{ $message }} </li>
                    @endforeach
                </ul>
            </div>
            @endif

            
            <form
                action="{{ route('journal.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="succession_id" name="succession_id" value="{{ $succession->id }}">
                <div class="my-4 flex justify-around">
                    <div class="">
                        <x-input.label for="sown[]" :value="__('Sowing Date')" />
                        <x-input.text type="date" name="sown[]" 
                            class="bg-white block border w-full h-10 text-xl outline-none
                            px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                            value="{{ old('sown', $today->format('d M Y')) }}" />
                    </div>
                    <div>
                        <x-input.label for="sow_direct" :value="__('Direct Sown')" />
                        <x-input.text id="sow_direct" name="sow_direct"
                            type="checkbox"
                            class="p-3 bg-white block border w-10 h-10 text-2xl outline-none" />
                    </div>
                    <div class="w-1/4">
                        <x-input.label for="plant_type_id" :value="__('Plant Type')" />
                        <select id="plant_type_id" name="plant_type_id" 
                            class="bg-white block border w-full h-10 text-xl outline-none
                            px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                            <option value="{{ $plantType->id }}" {{ old('plant_type_id') == $plantType->id ? 'selected' : '' }}>
                                {{ $plantType->name }}
                            </option>
                        </select>
                    </div>
                    <div class="w-1/4">
                        <x-input.label for="variety_id" :value="__('variety Name')" />
                        <select id="variety_id" name="variety_id" 
                            class="bg-white block border w-full h-10 text-xl outline-none
                            px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                            <option value="">-- variety sown --</option>
                            @foreach ($varieties as $variety)
                                <option value="{{ $variety->id }}" {{ old('variety_id') == $variety->id ? 'selected' : '' }}>
                                    {{ $variety->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                {{-- <div>
                    <x-input.label for="variety_id" :value="__('variety Name')" />
                    <x-input.text id="variety_id" name="variety_id"
                    class="bg-white block border w-full h-10 text-2xl outline-none"
                    autocomplete="off"
                    placeholder="variety name..." />
                </div> --}}





                
                {{-- show selection of succesions
                <div class="list">
                    <div id="yearview"
                        data-ss="{{ $succession->sow_start }}"
                        data-se="{{ $succession->sow_end }}"
                        data-ps="{{ $succession->plant_start }}"
                        data-pe="{{ $succession->plant_end }}"
                        data-hs="{{ $succession->harvest_start }}"
                        data-he="{{ $succession->harvest_end }}"
                        data-yd="{{ getdate()['yday'] }}">
                    </div> --}}
                    
                    {{-- @foreach ($sowings as $succession)
                    <div class=""> --}}
                        {{-- <p>{{ $plantType->name }}</p>
                        <div class="flex">
                            <div class="w-1/6">{{ $succession->sow_start }}</div>
                            <div class="w-1/6">{{ $succession->sow_end }}</div>
                            <div class="w-1/6">{{ $succession->plant_start }}</div>
                            <div class="w-1/6">{{ $succession->plant_end }}</div>
                            <div class="w-1/6">{{ $succession->harvest_start }}</div>
                            <div class="w-1/6">{{ $succession->harvest_end }}</div>
                        </div> --}}
                    {{-- </div>
                    @endforeach --}}
                {{-- </div>
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
                            <p class="">{{ ($succession->plant) ? $succession->plant->format('d M') : "" }}</p>
                            
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
                    </div> --}}
                
                    {{-- <script type="text/javascript">
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
                        <p class="pl-6">{{ $succession->start_seeds }}</p>
                        <h3 class="text-2xl">grow seedlings :</h3>
                        <p class="pl-6">{{ $succession->grow_seedlings }}</p>
                        <h3 class="text-2xl">planting density :</h3>
                        <p class="pl-6">{{ $succession->planting_density }}</p>
                        <h3 class="text-2xl">growing notes :</h3>
                        <p class="pl-6">{{ $succession->growing_notes }}</p>
                        <h3 class="text-2xl">yield_notes :</h3>
                        <p class="pl-6">{{ $succession->yield_notes }}</p>
                        <h3 class="text-2xl">variety notes :</h3>
                        <p class="pl-6">{{ $succession->variety_notes }}</p>
                        <h3 class="text-2xl">varieties recommended :</h3>
                        <p class="pl-6">{{ $succession->varieties_recommended }}</p>
                    </div>
                </div> --}}

                <button
                type="submit"
                class="uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Journal
                </button>
            </form>
        </div>
    </div>
</x-layout>            