<div class="py-5 px-12 flex">
    <x-button.nav href="{{ route('home') }}">
        < Home page
    </x-button.nav>
    <x-button.nav href="{{ URL::previous() }}">
        < Back to previous page
    </x-button.nav>
</div>
