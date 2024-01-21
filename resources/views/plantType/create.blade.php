<x-layout>
    <x-slot:title>
        Create PlantType page
    </x-slot:title>

    <div class=" p-4 sm:p-6 lg:p-8">
        
        <div class="m-auto py-8">
            @if ($errors->any())
            <div class="pb-8">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Something went wrong ...
                </div>
                <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $message )
                        <li> {{ $message }} </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form
                action="{{ route('plantType.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="flex">
                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input.label for="name" :value="__('Name')" />
                            <x-input.text id="name" name="name"
                                class="bg-white block border w-full h-10 text-2xl outline-none"
                                autocomplete="off" placeholder="Common name..."
                                value="{{ old('name') }}" />
                        </div>
                        
                        <div>
                            <x-input.label for="name" :value="__('Latin Name')" />
                            <x-input.text id="latin" name="latin"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="Latin name..."
                            value="{{ old('latin') }}" />
                        </div>
                    </div>

                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input.label for="family" :value="__('Family')" />
                            <select id="family" name="family_id" 
                                class="bg-white block border w-full h-10 text-xl outline-none
                                px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option disabled selected>--Pick plant family--</option>
                                @foreach ( $families as $family )
                                    <option value="{{ $family->id }}" >{{ $family->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-4 flex">
                            <div class="w-1/2">
                                <x-input.label for="perennial" :value="__('Perennial')" class="" />
                                <input id="perennial" name="perennial"
                                type="checkbox" value="1"
                                class="appeance-none h-10 w-10 bg-white  border text-2xl outline-none
                                border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            </div>
                            <div class="w-1/2">
                                <x-input.label for="multisow" :value="__('multisow')" />
                                <x-input.text id="multisow" name="multisow"
                                    type="number" value="{{ old('multisow') }}"
                                    class=" bg-white block border w-20 h-10 text-2xl outline-none" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4 flex">
                    <div class="w-1/2 px-4">
                        <x-input.label for="germ_temp_img" :value="__('Germination temperature image')" />
                        <input type="file" name="germ_temp_img" id="germ_temp_img"
                            class="pl-4 text-xl outline-none"
                            value="{{ old('germ_temp_img') }}" >
                    </div>
                        <div class="w-1/2 px-4">
                            <x-input.label for="plant_type_img" :value="__('Plant type image')" />
                            <input type="file" name="plant_type_img" id="plant_type_img"
                                class="pl-4 text-xl outline-none"
                                value="{{ old('plant_type_img') }}" >
                        </div>
                </div>

                <div class="my-4 flex">
                    <div class="w-1/2 px-4">
                        <x-input.label for="dates_best_sow" :value="__('dates_best_sow')" />
                        <x-input.text id="dates_best_sow" name="dates_best_sow"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off" placeholder="Months.." 
                        value="{{ old('dates_best_sow') }}" />
                    </div>
                    <div class="w-1/2 px-4">
                        <x-input.label for="dates_main_harvest" :value="__('dates_main_harvest')" />
                        <x-input.text id="dates_main_harvest" name="dates_main_harvest"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off" value="{{ old('dates_main_harvest') }}"
                        placeholder="Months..." />
                    </div>
                </div>

                <div class="flex my-4">
                    <div class="w-1/2 px-4">
                        
                        <div class="my-4">
                            <x-input.label for="hardiness_young_plants" :value="__('hardiness_young_plants')" />
                            <x-input.text id="hardiness_young_plants" name="hardiness_young_plants"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="Hardiness"
                            value="{{ old('hardiness_young_plants') }}" />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="root_depth" :value="__('root_depth')" />
                            <x-input.text id="root_depth" name="root_depth"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="depth" 
                            value="{{ old('root_depth') }}" />
                        </div>
                        
                        <div class="my-4">
                            <x-input.label for="interplant_into" :value="__('interplant_into')" />
                            <x-input.text id="interplant_into" name="interplant_into"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="plant types..." 
                            value="{{ old('interplant_into') }}" />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="interplant_with" :value="__('interplant_with')" />
                            <x-input.text id="interplant_with" name="interplant_with"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="plant types..." 
                            value="{{ old('interplant_with') }}" />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="relay_plant_into" :value="__('relay_plant_into')" />
                            <x-input.text id="relay_plant_into" name="relay_plant_into"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="plant types..." 
                            value="{{ old('relay_plant_into') }}" />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="relay_plant_with" :value="__('relay_plant_with')" />
                            <x-input.text id="relay_plant_with" name="relay_plant_with"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="plant types..."
                            value="{{ old('relay_plant_with') }}" />
                        </div>
                    </div>
    
                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input.label for="mulch" :value="__('mulch')" />
                            <x-input.text id="mulch" name="mulch"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="mulch material..."
                            value="{{ old('mulch') }}" />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="feeder_type" :value="__('feeder_type')" />
                            <x-input.text id="feeder_type" name="feeder_type"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="hungry?"
                            value="{{ old('feeder_type') }}" />
                        </div>
                        
                        <div class="my-4">
                            <x-input.label for="fertiliser" :value="__('fertiliser')" />
                            <x-input.text id="fertiliser" name="fertiliser"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="feed with..."
                            value="{{ old('fertiliser') }}" />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="when_to_fertilise" :value="__('when_to_fertilise')" />
                            <x-input.text id="when_to_fertilise" name="when_to_fertilise"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="when..."
                            value="{{ old('when_to_fertiliser') }}" />
                        </div>                        
        
                        
        
                        <div class="my-4">
                            <x-input.label for="competitor" :value="__('competitor')" />
                            <x-input.text id="competitor" name="competitor"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="strength..."
                            value="{{ old('competitor') }}" />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="competition_period" :value="__('competition_period')" />
                            <x-input.text id="competition_period" name="competition_period"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="when..."
                            value="{{ old('competition_period') }}" />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="companions" :value="__('companions')" />
                            <x-input.text id="companions" name="companions"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off" placeholder="plant type..."
                            value="{{ old('companions') }}" />
                        </div>
    
                    </div>
                </div>




                <button
                    type="submit"
                    class="uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit PlantType
                </button>
            </form>
        </div>
    </div>
</x-layout>