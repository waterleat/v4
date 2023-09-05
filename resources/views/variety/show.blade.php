<x-layout>
    <x-slot:title>
        Show variety page
    </x-slot:title>

    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{ URL::previous() }}"
            class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                < Back to previous page
            </a>
        </div>

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $variety->name }}
        </h2>
        <div class="flex">
            <div class="">
                <h3>{{ $variety->latin }}</h3>
                <p>{{ $variety->description }}</p>
            </div>
            <div class="">
                <p>height {{ $variety->height }} m</p>
                <p>spread {{ $variety->spread }} m</p>
                <p>maturity {{ $variety->days2maturity }} days</p>
            </div>
        </div>


        {{-- <div class="block lg:flex flex-row">
            <div class="basis-9/12 text-center sm:block sm:text-left">
                <span class="text-left sm:text-center sm:inline block text-gray-900 pb-10 pt-0 sm:pt-10 pl-0 sm:pl-4 -mt-8 sm:-mt-0">
                    Made by:
                    <a
                        href=""
                        class="font-bold text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                        Code With Dary
                    </a>
                    On 17-07-2022
                </span>
            </div>
        </div> --}}
    </div>
</x-layout>