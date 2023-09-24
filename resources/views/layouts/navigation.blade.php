

<div class="pt-10">
    <a href="{{ route('home') }}"
    {{-- class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 p-3 transition-all py-20"> --}}
    class="px-4 py-1 text-sm font-semibold bg-green-400 rounded-full border border-purple-200 hover:text-purple-600 hover:bg-green-300 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
        < Home page
    </a>
    <a href="{{ URL::previous() }}"
    class="px-4 py-1 text-sm font-semibold bg-green-400 rounded-full border border-purple-200 hover:text-purple-600 hover:bg-green-300 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
        < Back to previous page
    </a>
    {{-- <a href="{{ URL::previous() }}"
    class="px-4 py-1 text-sm font-semibold bg-green-400 rounded-full border border-purple-200 hover:text-purple-600 hover:bg-green-300 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2"> --}}
    {{-- class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2"> --}}
        {{-- < Back to previous page
    </a> --}}
</div>
