<x-layout>
    <x-slot:title>
        Show Family page
    </x-slot:title>

    <div class="w-4/5 mx-auto bg-white">

        <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ml-10">
            {{ $family->name }}
        </h2>

        <div class="flex px-8">
            <div class="w-1/3 mb-6">
                <div class="mb-4">
                    <h3 class="text-2xl">Latin name</h3>
                    <p class="ml-8 py-2">{{ $family->latin }}</p>
                </div>
                <div>
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
                </div>
            </div>
            <div class="w-2/3">
                <h3 class="text-2xl">Description</h3>
                <p class="mx-8 py-2">{{ $family->description }}</p>
            </div>
        </div>




    </div>
</x-layout>