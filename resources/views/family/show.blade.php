<x-layout>
    <x-slot:title>
        Show Family page
    </x-slot:title>

    <div class="w-4/5 mx-auto bg-white">

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $family->name }}
        </h2>
        <h3 class="text-2xl">Latin name</h3>
        <p class="ml-8 py-2">{{ $family->latin }}</p>

        <h3 class="text-2xl">Description</h3>
        <p class="ml-8 py-2">{{ $family->description }}</p>

        <h3 class="text-2xl">Plant types</h3>
        <ul class="ml-8 py-2">

            @forelse ( $family->plantTypes as $plantType )
            <li class="mb-2">
                <x-button.small href="{{ route('plantType.show', ['plantType'=>$plantType]) }}">
                    {{ $plantType['name'] }}
                </x-button.small>
            </li>
            @empty
                no plant types found
            @endforelse
        </ul>

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