<div>
    <form wire:submit="addPlan" wire:key="{{ $sid }}" >
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <input type="hidden" wire:model="sid" value="{{ $sid }}">
        
        {{-- <input type="hidden" wire:model="url" value="{{ Request::url() }}"> --}}
        
        <button type="submit" class="text-base bg-green-500 py-0.5 px-2 
        shadow-xl rounded-full transition-all hover:bg-green-400">
            Add Plan
        </button>
    </form>
</div>
