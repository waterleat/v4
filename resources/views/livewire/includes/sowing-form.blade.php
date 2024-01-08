<section class="bg-orange-200 dark:bg-gray-800">
    <div class="px-4 py-2 mx-auto ">
        <h2 class=" text-2xl tracking-tight font-bold text-center text-gray-900 dark:text-white">Sowing Seeds</h2>
        <form action="" class="flex justify-between">
            <div class="">
                <div class="flex">
                    <div class="mr-4 ">
                        <x-input.label value="Date Sown" for="sown" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                        <x-input.text wire:model="sownDate" value="{{ $today->format('Y-m-d') }}" type="date" id="sown" 
                        class="p-3 bg-white block border w-full h-10 text-sm outline-none" required />
                        @error('sownDate')
                            <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mr-4">
                        <x-input.label for="variety_id" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" value="Variety" />
                        <select wire:model="variety_id" id="variety_id" class="bg-white block border w-full h-10 text-sm outline-none pl-3 pr-6 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                            <option value="seed name"></option>
                            @foreach ($plan->succession->plantType->varieties as $variety)
                                <option value="{{ $variety->id }}" >{{ $variety->name }}</option>
                            @endforeach
                        </select>
                        @error('variety_id')
                            <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 !text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                        <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                    </div> --}}
                    <div class="mr-4">
                        <x-input.label for="sow_direct" value="Sow Direct" class="mb-1 !text-sm font-medium text-gray-900 dark:text-gray-400" />
                        <input wire:model="sow_direct" type="checkbox" id="sow_direct" value="1"
                        class="appearance-none bg-white block border mx-auto w-10 h-10 text-2xl outline-none border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                    </div>
                    <div class="mr-4">
                        <x-input.label value="Sowing Location" for="sowing_location" class="mb-1 !text-sm font-medium text-gray-900 dark:text-gray-400" />
                        <select wire:model="sowing_location" id="sowing_location" 
                        class="bg-white block border w-full h-10 text-sm outline-none p2 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                            <option value="">Sowing Locn</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}"
                                    {{-- @if ()
                                        
                                    @endif --}}
                                >
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sowing_location')
                            <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mr-4">
                        <x-input.label value="Number sown" for="multi" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                        <x-input.text wire:model="multi" type="number" id="multi" min="1" class="w-20" value="1" />
                    </div>
                    <div class="mr-4">
                        <x-input.label value="Number cells" for="cells" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                        <x-input.text wire:model="cells" type="number" id="cells" min="1" class="w-20" value="1" />
                    </div>
                    {{-- <div class="mr-4">
                        <x-input.label value="Temperature" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                        <x-input.text type="number" min="10" class="w-20" value="" />C
                    </div> --}}
                    
                    <div class="mr-4" >
                        <x-input.label value="Notes" for="notes" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                        <x-input.textarea wire:model="notes" id="notes" class="" />
                    </div>

                </div>
            </div>
            
            <div class="flex flex-col justify-around w-28">
                <button wire:click.prevent="createSowing" type="submit" class=" py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save Sowing</button>
                <button wire:click.prevent="cancelSowing" type="submit" class="py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-red-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cancel</button>
            </div>
        </form>
    </div>
</section>