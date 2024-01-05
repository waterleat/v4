<div class="py-5 px-12 flex justify-between">
    <div class="flex">
        <x-button.nav href="{{ route('home') }}">
            < Home page
        </x-button.nav>
        <x-button.nav href="{{ URL::previous() }}">
            < Back to previous page
        </x-button.nav>
    </div>
    <x-button.nav href="/test2">
        Test2
    </x-button.nav>
    <div class="flex">
        <x-button.nav href="{{ route('family.index') }}">
            Families
        </x-button.nav>
        <x-button.nav href="{{ route('plantType.index') }}">
            Plant Types
        </x-button.nav>
        <x-button.nav href="{{ route('variety.index') }}">
            Varieties
        </x-button.nav>
        <x-button.nav href="{{ route('plan.index') }}">
            Plans
        </x-button.nav>
    </div>
</div>
