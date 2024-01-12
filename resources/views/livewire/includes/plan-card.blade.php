<div  wire:key={{ $plan->id }} >
    <x-layout.index-cards class="w-full">
        <div class="w-full flex">
            <div>
                {{-- {{ dd($plan->planStatus->colour) }} --}}
                <div class="w-28 mr-2 px-2 py-1 {{ $plan->planStatus->colour }} text-lg text-center">
                    {{ $plan->planStatus->name }}
                </div>
            </div>

            <div class="w-32 mr-2 px-2 py-1 text-gray-900 hover:text-gray-700 hover:bg-green-100 transition-all">
                <a href="{{ route('plan.show', ['plan'=>$plan->id]) }}">
                    <h2 class="text-xl font-bold">
                        {{ $plan->succession->plantType->name }} 
                    </h2>
                </a>
            </div>

            <div class="w-36">
                {{-- @if (isset($plan->locn_growing))
                    {{ $locations->find($plan->locn_growing)->name }}
                @endif --}}
                @if ($selectedPlanLocation === $plan->id)
                    <div class="">
                        <select wire:model="editLocn" id="" class="block w-36 p-1 pr-6 bg-gray-100  text-gray-900 text-sm rounded ">
                            <option value="">Where..?</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $editLocn == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        <button wire:click.prevent="createLocn" type="submit" class=" py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save Locn</button>
                        <button wire:click.prevent="cancelForm" type="submit" class="py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-red-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cancel</button>
                    </div>
                @else
                    <h3 class="py-1 text-lg text-semibold text-gray-800">
                        {{ $plan->locn_growing ? $locations->find($plan->locn_growing)->name :''}}
                        
                    </h3>
                @endif
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
            <div id="plan-{{ $loop->iteration }}" class="w-64 h-8">
                <canvas id="canvas-sow-{{ $loop->iteration }}" width="600" height="30" 
                    class="w-full h-full border border-gray-300">
                    Your browser does not support the HTML canvas tag.
                </canvas>
            </div>

            <div class=" ml-4 flex  items-center flex-wrap">
                <button wire:click="changeGrowLocn({{ $plan->id }})" type="button"
                class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
                    Location
                </button>
                <button wire:click="sowSeeds({{ $plan->id }})" type="button"
                class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
                    Sow seeds
                </button>

                <button wire:click="germinateSeeds({{ $plan->id }})" type="button"
                class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
                    Germinated
                </button>

                <button wire:click="plantSeedlings({{ $plan->id }})" type="button"
                class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
                    Planted
                </button>

                <button wire:click="fistHarvest({{ $plan->id }})" type="button"
                class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
                    1st harvest
                </button>
                        
                <button wire:click="lastHarvest({{ $plan->id }})" type="button"
                class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
                    Finished
                </button>
    
            </div>
        </div >
        
        @if ($selectedPlanSowing === $plan->id)
            @include('livewire.includes.sowing-form')
        @endif

        @if ($selectedPlanGermination === $plan->id)
            @include('livewire.includes.germination-form')
        @endif

        @if ($selectedPlanPlanted === $plan->id)
            @include('livewire.includes.planted-form')
        @endif
    </x-layout.index-cards>
</div>