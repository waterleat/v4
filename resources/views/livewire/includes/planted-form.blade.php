<section class="bg-green-200 dark:bg-gray-800">
    <div class="px-4 py-2 mx-auto ">
        <h2 class=" text-2xl tracking-tight font-bold text-center text-gray-900 dark:text-white">Planting Seedlings</h2>
        <form action="" class="flex justify-between">
            <div class="flex">
                <div class="mr-4">
                    <x-input.label value="Planted Date" for="planted" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                    <x-input.text  wire:model="plantedDate" type="date" id="planted" 
                    class="p-3 bg-white block border w-full h-10 text-sm outline-none" required />
                    @error('plantedDate')
                        <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                    @enderror
            </div>
                <div class="mr-4">
                    <x-input.label value="Growing Location" for="growing_location" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                    <select wire:model="growing_locn" id="growing_location" class="bg-white block border w-full h-10 text-sm outline-none pl-3 pr-6 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option value="" disabled>Growing locn</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ ( $location->id == $growing_locn) ? 'selected' : '' }} >
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('growing_location')
                        <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center ">
                    <div>
                        <button wire:click.prevent="createPlanted" type="submit" class=" mr-4 py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save Planting</button>
                    </div>
                    <div>
                        <button wire:click.prevent="cancelForm" type="submit" class="py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-red-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>