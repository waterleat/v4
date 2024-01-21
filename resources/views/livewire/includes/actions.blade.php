<div class="p-4 pb-0">
    <div class=" py-2 flex  items-center justify-around flex-wrap">
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
        <button wire:click="firstHarvest({{ $plan->id }})" type="button"
        class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
            1st harvest
        </button>
        <button wire:click="lastHarvest({{ $plan->id }})" type="button"
        class="bg-green-400  my-1 px-2 text-center mr-4 rounded-full">
            Finished
        </button>
        <button wire:click="delete({{ $plan->id }})" type="button"
            class="bg-red-400  my-1 px-2 text-center mr-4 rounded-full">
                Delete
            </button>
    </div>
</div>