<x-layout>
    <x-slot:title>
        Edit Variety {{ $variety->name }}
    </x-slot:title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        Edit Variety {{ $variety->name }}
        <div class="m-auto pt-20">
            @if ($errors->any())
            <div class="pb-8">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Something went wrong ...
                </div>
                {{-- {{ dd($errors) }} --}}
                <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $message )
                        <li> {{ $message }} </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class=""
                action="{{ route('variety.update', ['variety' => $variety]) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="my-4">
                    <x-input-label for="name" :value="__('Variety')" />
                    <x-text-input type="text" name="name" id="name"
                        value="{{ $variety->name }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                </div>

                <div class="my-4">
                    <x-input-label for="plantType" :value="__('Plant Type')" />
                    <select id="plantType" name="plant_type_id" 
                    class="bg-white block border w-full h-10 text-xl outline-none
                    px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option>--Pick plant type--</option>
                        @foreach ( $plantTypes as $plantType )
                            <option value="{{ $plantType->id }}" 
                            @if ($plantType->id == old('plant_type_id', $variety->plant_type_id))
                                selected="selected"
                            @endif
                            >{{ $plantType->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="my-4">
                    <x-input-label for="info" :value="__('Info')" />
                    <x-text-input type="text" name="info" id="info"
                        value="{{ $variety->info }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                </div>


                <div class="my-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea-input name="description" id="description"
                        placeholder=""
                        :value="$variety->description"
                        class="p-3 bg-white block border w-full h-60 text-2xl outline-none" />
                </div>

                <div class=" flex pb-8 justify-around">
                    <div class="w-40 my-4">
                        <x-input-label for="height" :value="__('Height (m)')" />
                        <x-text-input id="height" name="height"
                            type="number" min="0" step=0.1 max="10"
                            placeholder="Height..."
                            value="{{ $variety->height }}"
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                    </div>

                    <div class="w-40 my-4">
                        <x-input-label for="spread" :value="__('Spread (m)')" />
                        <x-text-input id="spread"  name="spread"
                            type="number" min="0" step=0.05 max="10"
                            value="{{ $variety->spread }}"
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                    </div>
                    <div class="w-40 my-4">
                        <x-input-label for="days2maturity" :value="__('Days to Maturity')" />
                        <x-text-input name="days2maturity" id="days2maturity"
                            type="number"
                            value="{{ $variety->days2maturity }}"
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                    </div>
                </div>


                {{-- <label for="is_published" class="text-gray-500 text-2xl">
                    Is Published
                </label>
                <input
                    type="checkbox"
                    class="bg-transparent  border-b-2 inline text-2xl outline-none"
                    name="is_published"> --}}

                    
                {{-- <div class="bg-grey-lighter py-10">
                    <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                            <span class="mt-2 text-base leading-normal">
                                Select a file
                            </span>
                        <input
                            type="file"
                            name="image"
                            class="hidden">
                    </label>
                </div> --}}

                <button
                    type="submit"
                    class="uppercase mt-15 bg-green-500 text-indigo-700 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Variety
                </button>
            </form>
        </div>
    </div>
</x-layout>