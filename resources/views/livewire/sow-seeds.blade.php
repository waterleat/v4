<div class="mr-4"  wire:key="{{ $pid }}">
    <form wire:submit="addJournal" action="">
        {{-- @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif --}}
    
        <input type="hidden" wire:model="pid" value="{{ $pid }}">
            
        {{-- <input type="hidden" wire:model="url" value="{{ Request::url() }}"> --}}
        <button class="text-base bg-green-500 py-0.5 px-2 shadow-xl rounded-full transition-all hover:bg-green-400">
            sow seeds
        </button>
    </form>
</div>
