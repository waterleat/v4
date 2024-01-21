<div class="py-3 px-12 flex justify-between">
    <div class="flex flex-wrap">
        <x-button.nav href="{{ route('home') }}" class="mt-2">
            < Home page
        </x-button.nav>
        <x-button.nav href="{{ URL::previous() }}" class="mt-2">
            < Back to previous page
        </x-button.nav>
    </div>
    <x-button.nav href="/test2" class="mt-2">
        Test2
    </x-button.nav>
    <div class="flex flex-wrap justify-around">
        <x-button.nav href="{{ route('family.index') }}" class="mt-2">
            Families
        </x-button.nav>
        <x-button.nav href="{{ route('plantType.index') }}" class="mt-2">
            Plant Types
        </x-button.nav>
        <x-button.nav href="{{ route('variety.index') }}" class="mt-2">
            Varieties
        </x-button.nav>
        <x-button.nav href="{{ route('plan.index') }}" class="mt-2">
            Plans
        </x-button.nav>
    </div>
</div>
