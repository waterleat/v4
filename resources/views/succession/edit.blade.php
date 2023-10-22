<x-layout>
    <x-slot:title>
        edit succession
        {{-- Edit PlantType {{ $succession->name }} --}}
    </x-slot:title>
    
    <div class="mx-8 p-4 sm:p-6 lg:p-8">
        
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

            <form
            action="{{ route('succession.update', ['succession'=>$succession] ) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="flex">
                <div class="w-1/2">
                    <x-input.label for="succession_type_id" :value="__('Type')" />
                    {{-- <x-input.text name="type" id="type"
                        value="{{ $succession->type }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" /> --}}
                    <select name="succession_type_id" id="succession_type_id" 
                    class="bg-white block border w-full h-10 text-xl outline-none
                    px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option>--Pick succession type--</option>
                        @foreach ( $successionTypes as $successionType )
                            <option value="{{ $successionType->id }}"
                            @if ($successionType->id == old('succession_type_id', $succession->succession_type_id))
                                selected="selected"
                            @endif
                            >{{ $successionType->name }}</option>
                        @endforeach
                    </select>       
                </div>
                <div class="w-1/2">
                    <x-input.label for="plant_type_id" :value="__('Plant Type')" />
                    <select id="plant_type_id" name="plant_type_id" 
                    class="bg-white block border w-full h-10 text-xl outline-none
                    px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option>--Pick plant type--</option>
                        @foreach ( $plantTypes as $plantType )
                            <option value="{{ $plantType->id }}" 
                            @if ($plantType->id == old('plant_type_id', $succession->plant_type_id))
                                selected="selected"
                            @endif
                            >{{ $plantType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            
            <div class="flex my-4">
                <x-input.label for="cd" :value="__('Charles Dowding timing')" class="mr-4"/>
                <input name="cd" id="cd"
                type="checkbox" value="1"
                class="appearance-none bg-white block border  h-10 w-10 text-2xl outline-none
                border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                {{ $succession->cd ? 'checked' : '' }} 
                >
            </div>

            <div class="w-full my-4">
                <x-input.label for="varieties_recommended" :value="__('varieties_recommended')" />
                <x-input.text id="varieties_recommended" name="varieties_recommended"
                    placeholder="varieties_recommended..."
                    value="{{ $succession->varieties_recommended }}"
                    class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
            </div>

            <div class="flex pt-8 justify-around">
                <div class="w-80 my-4">
                    <x-input.label for="sow" :value="__('Sow')" />
                    <x-input.text id="sow" name="sow"
                        placeholder="Sow..."
                        value="{{ $succession->sow }}"
                        class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                </div>
                <div class="w-80 my-4">
                    <x-input.label for="plant" :value="__('Plant')" />
                    <x-input.text id="plant" name="plant"
                        placeholder="Plant..."
                        value="{{ $succession->plant }}"
                        class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                </div>
            </div>
            <div class="flex pb-8 justify-around">
                <div class="w-80 my-4">
                    <x-input.label for="first_harvest" :value="__('First Harvest')" />
                    <x-input.text id="first_harvest" name="first_harvest"
                        placeholder="First Harvest..." 
                        value="{{ $succession->first_harvest }}"
                        class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                </div>
                <div class="w-80 my-4">
                    <x-input.label for="last_harvest" :value="__('Last Harvest')" />
                    <x-input.text id="last_harvest" name="last_harvest"
                        {{-- placeholder="Last Harvest..."  --}}
                        value="{{ $succession->last_harvest }}"
                        class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
                </div>
            </div>

            <div class=" my-4">
                <x-input.label for="start_seeds" :value="__('Start seeds')" />
                <x-input.text id="start_seeds" name="start_seeds"
                    {{-- placeholder="Last Harvest..."  --}}
                    value="{{ $succession->start_seeds }}"
                    class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
            </div>
            <div class=" my-4">
                <x-input.label for="grow_seedlings" :value="__('Grow seedlings')" />
                <x-input.text id="grow_seedlings" name="grow_seedlings"
                    {{-- placeholder="Last Harvest..."  --}}
                    value="{{ $succession->grow_seedlings }}"
                    class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
            </div>
            <div class=" my-4">
                <x-input.label for="grow_plants" :value="__('Grow plants')" />
                <x-input.text id="grow_plants" name="grow_plants"
                    {{-- placeholder="Last Harvest..."  --}}
                    value="{{ $succession->lastHarvest }}"
                    class="p-3 bg-white block border w-full h-10 text-2xl outline-none" />
            </div>

            
            <div class="my-4">
                <x-input.label for="planting_density" :value="__('planting_density')" />
                <x-input.textarea name="planting_density"
                    placeholder=""
                    :value="$succession->planting_density"
                    class="p-3 bg-white block border w-full h-60 text-2xl outline-none" />
            </div>
            <div class="my-4">
                <x-input.label for="c" :value="__('variety_notes')" />
                <x-input.textarea name="variety_notes"
                    placeholder=""
                    :value="$succession->variety_notes"
                    class="p-3 bg-white block border w-full h-60 text-2xl outline-none" />
            </div>
            <div class="my-4">
                <x-input.label for="growing_notes" :value="__('growing_notes')" />
                <x-input.textarea name="growing_notes"
                    placeholder=""
                    :value="$succession->growing_notes"
                    class="p-3 bg-white block border w-full h-60 text-2xl outline-none" />
            </div>
            <div class="my-4">
                <x-input.label for="yield_notes" :value="__('yield_notes')" />
                <x-input.textarea name="yield_notes"
                    placeholder=""
                    :value="$succession->yield_notes"
                    class="p-3 bg-white block border w-full h-60 text-2xl outline-none" />
            </div>

            
            
            
            

            <button
            type="submit"
            class="uppercase mt-15 bg-green-500 text-indigo-700 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit succession
        </button>
    </form>
</div>
</div>
</x-layout>

