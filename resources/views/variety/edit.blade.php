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
                    <x-input.label for="name" :value="__('Variety')" />
                    <x-input.text type="text" name="name" id="name"
                        value="{{ old('name', $variety->name) }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                </div>

                <div class="my-4">
                    <x-input.label for="plantType" :value="__('Plant Type')" />
                    <select id="plantType" name="plant_type_id" 
                    class="bg-white block border w-full h-10 text-xl outline-none
                    px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option disabled>--Pick plant type--</option>
                        @foreach ( $plantTypes as $plantType )
                            <option value="{{ $plantType->id }}" 
                            {{ $plantType->id == old('plant_type_id', $variety->plant_type_id) ? "selected" : "" }}>
                                {{ $plantType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="my-4">
                    <x-input.label for="info" :value="__('Info')" />
                    <x-input.text type="text" name="info" id="info"
                        value="{{ old('info', $variety->info) }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                </div>


                <div class="my-4">
                    <x-input.label for="description" :value="__('Description')" />
                    <x-input.textarea name="description" id="description"
                        placeholder=""
                        value="{{ old('description', $variety->description) }}"
                        class="p-3 bg-white block border w-full h-60 text-2xl outline-none" />
                </div>

                <div class=" flex pb-8 justify-around">
                    <div class="w-40 my-4">
                        <x-input.label for="height" :value="__('Height (m)')" />
                        <x-input.text id="height" name="height"
                            type="number" min="0" step=0.05 max="10"
                            placeholder="Height..."
                            value="{{ old('height', $variety->height) }}"
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                    </div>

                    <div class="w-40 my-4">
                        <x-input.label for="spread" :value="__('Spread (m)')" />
                        <x-input.text id="spread"  name="spread"
                            type="number" min="0" step=0.05 max="10"
                            value="{{ old('spread', $variety->spread) }}"
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                    </div>
                    <div class="w-40 my-4">
                        <x-input.label for="days2maturity" :value="__('Days to Maturity')" />
                        <x-input.text name="days2maturity" id="days2maturity"
                            type="number"
                            value="{{ old('days2maturity', $variety->days2maturity) }}"
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                    </div>
                </div>



                <div class="flex my-4">
                    <div class="w-1/3 px-4">
                        <div class="w-10 my-4">
                            <x-input.label for="sow_direct" :value="__('sow_direct')" />
                            <input id="sow_direct" name="sow_direct"
                            type="checkbox" value="1"
                            class="appearance-none bg-white block border w-full h-10 text-2xl outline-none
                            border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            {{ old('sow_direct', $variety->sow_direct) ? 'checked' : '' }} 
                            >
                        </div>
                        
                        <div class="my-4">
                            <x-input.label for="multi" :value="__('multi')" />
                            <x-input.text id="multi" name="multi"
                            type="number"
                            value="{{ old('multi', $variety->multi) }}"
                            class="p-3 bg-white block border w-20 h-10 text-2xl outline-none" />
                        </div>

                        <div class="w-10 my-4">
                            <x-input.label for="spacing" :value="__('spacing')" />
                            <x-input.text id="spacing" name="spacing"
                                type="number"
                                value="{{ old('spcacing', $variety->spacing) }}"
                                class="p-3 bg-white block border w-20 h-10 text-2xl outline-none" />
                        </div>
                    </div>

                    <div class="w-2/3 px-4">
                        <div class="my-4">
                            <x-input.label for="sowing" :value="__('sowing')" />
                            <x-input.text id="sowing" name="sowing"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            value="{{ old('sowing', $variety->sowing) }}"
                            autocomplete="off"
                            placeholder="Common name..." />
                        </div>

                        <div class="my-4">
                            <x-input.label for="harvest" :value="__('harvest')" />
                            <x-input.text id="harvest" name="harvest"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            value="{{ old('harvest', $variety->harvest) }}"
                            autocomplete="off"
                            placeholder="Common name..." />
                        </div>

                        <div class="my-4">
                            <x-input.label for="store" :value="__('store')" />
                            <x-input.text id="store" name="store"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            value="{{ old('store', $variety->store) }}"
                            autocomplete="off"
                            placeholder="Common name..." />
                        </div>
                    </div>
                </div>

                <button
                    type="submit"
                    class="uppercase mt-15 bg-green-500 text-indigo-700 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Variety
                </button>
            </form>
        </div>
    </div>
</x-layout>