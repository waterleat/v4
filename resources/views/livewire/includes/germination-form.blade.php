<section class="bg-lime-200 dark:bg-gray-800">
    <div class="px-4 py-2 mx-auto ">
        <h2 class=" text-2xl tracking-tight font-bold text-center text-gray-900 dark:text-white">Germination Seeds</h2>
        <form action="" class="flex justify-between">
            <div class="flex">
                <div class="mr-4">
                    <x-input.label value="Germination Date" for="germination" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                    <x-input.text  wire:model="germinationDate" type="date" id="germination" 
                    class="p-3 bg-white block border w-full h-10 text-sm outline-none" required />
                    @error('germinationDate')
                        <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                    @enderror
            </div>
                <div class="mr-4">
                    <x-input.label value="Nursery Location" for="nursery_locn" class=" mb-1 !text-sm font-medium text-gray-900 dark:text-gray-300" />
                    <select wire:model="nursery_locn" id="nursery_location" class="bg-white block border w-full h-10 text-sm outline-none pl-3 pr-6 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option value="" disabled>Nursery locn</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ ( $location->id == $nursery_locn) ? 'selected' : '' }} >
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('nursery_locn')
                        <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center ">
                    <div>
                        <button wire:click.prevent="createGermination" type="submit" class=" mr-4 py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save Germination</button>
                    </div>
                    <div>
                        <button wire:click.prevent="cancelForm" type="submit" class="py-1 px-2 text-sm font-medium text-center text-white rounded-lg bg-red-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>