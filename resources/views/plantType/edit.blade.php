<x-layout>
    <x-slot:title>
        Edit PlantType {{ $plantType->name }}
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
                action="{{ route('plantType.update', ['plantType'=>$plantType] ) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="flex">
                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input.label for="name" :value="__('Name')" />
                            <x-input.text name="name" id="name" placeholder="Common name..."
                            value="{{ old('name', $plantType->name) }}"
                            class="bg-white block border w-full h-10 text-2xl outline-none" />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="name" :value="__('Latin Name')" />
                            <x-input.text type="text" name="latin" placeholder="Latin name..."
                                value="{{ old('latin', $plantType->latin) }}"
                                class="bg-white block border w-full h-10 text-2xl outline-none" />
                        </div>
                    </div>

                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input.label for="family_id" :value="__('Family')" />
                            <select id="family_id" name="family_id" 
                            class="bg-white block border w-full h-10 text-xl outline-none
                            px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option disabled>--Pick plant family--</option>
                                @foreach ( $families as $family )
                                    <option value="{{ $family->id }}" {{ $family->id == old('family_id', $plantType->family_id) ? "selected" : ""}}>
                                        {{ $family->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex my-4">
                            <div class="w-1/2">
                                <x-input.label for="perennial" :value="__('Perennial')" />
                                <input name="perennial" id="perennial"
                                type="checkbox" value="1"
                                class="appearance-none bg-white block border w-10 h-10 text-2xl outline-none
                                border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                {{ old('perennial', $plantType->perennial) ? 'checked' : '' }} 
                                >
                            </div>
                            <div class="w-1/2">
                                <x-input.label for="multisow" :value="__('multisow')" />
                                <x-input.text id="multisow" name="multisow" type="number" 
                                    value="{{ old('multisow', $plantType->multisow) }}"
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
                            value="{{ old('germ_temp_img', $plantType->germ_temp_img) }}">
                    </div>
                    <div class="w-1/2 px-4">
                        <x-input.label for="plant_type_img" :value="__('Plant type image')" />
                        <input type="file" name="plant_type_img" id="plant_type_img"
                            class="pl-4 text-xl outline-none"
                            value="{{ old('plant_type_img', $plantType->plant_type_img) }}">
                    </div>
                </div>

                <div class="my-4 flex">
                    <div class="w-1/2 px-4">
                        <x-input.label for="dates_best_sow" :value="__('dates_best_sow')" />
                        <x-input.text id="dates_best_sow" name="dates_best_sow"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        value="{{ old('dates_best_sow', $plantType->dates_best_sow) }}"
                        placeholder="Months.." />
                    </div>
    
                    <div class="w-1/2 px-4">
                        <x-input.label for="dates_main_harvest" :value="__('dates_main_harvest')" />
                        <x-input.text id="dates_main_harvest" name="dates_main_harvest"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        value="{{ old('dates_main_harvest', $plantType->dates_main_harvest) }}"
                        placeholder="Months.." />
                    </div>
                </div>

                <div class="flex my-4">
                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input.label for="hardiness_young_plants" :value="__('hardiness_young_plants')" />
                            <x-input.text id="hardiness_young_plants" name="hardiness_young_plants"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('hardiness_young_plants', $plantType->hardiness_young_plants) }}"
                            placeholder="Hardiness" />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="root_depth" :value="__('root_depth')" />
                            <x-input.text id="root_depth" name="root_depth"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('root_depth', $plantType->root_depth) }}"
                            placeholder="" />
                        </div>
                        
                        <div class="my-4">
                            <x-input.label for="interplant_into" :value="__('interplant_into')" />
                            <x-input.text id="interplant_into" name="interplant_into"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('interplant_into', $plantType->interplant_into) }}"
                            placeholder="plant types..." />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="interplant_with" :value="__('interplant_with')" />
                            <x-input.text id="interplant_with" name="interplant_with"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('interplant_into', $plantType->interplant_into) }}"
                            placeholder="plant types..." />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="relay_plant_into" :value="__('relay_plant_into')" />
                            <x-input.text id="relay_plant_into" name="relay_plant_into"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('relay_plant_into', $plantType->relay_plant_into) }}"
                            placeholder="plant types..." />
                        </div>
    
                        <div class="my-4">
                            <x-input.label for="relay_plant_with" :value="__('relay_plant_with')" />
                            <x-input.text id="relay_plant_with" name="relay_plant_with"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('relay_plant_with', $plantType->relay_plant_with) }}"
                            placeholder="plant types..." />
                        </div>
                    </div>
    
                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input.label for="mulch" :value="__('mulch')" />
                            <x-input.text id="mulch" name="mulch"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('mulch', $plantType->mulch) }}"
                            placeholder="mulch material..." />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="feeder_type" :value="__('feeder_type')" />
                            <x-input.text id="feeder_type" name="feeder_type"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('feeder_type', $plantType->feeder_type) }}"
                            placeholder="hungry?" />
                        </div>
                        
                        <div class="my-4">
                            <x-input.label for="fertiliser" :value="__('fertiliser')" />
                            <x-input.text id="fertiliser" name="fertiliser"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('fertiliser', $plantType->fertiliser) }}"
                            placeholder="feed with..." />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="when_to_fertilise" :value="__('when_to_fertilise')" />
                            <x-input.text id="when_to_fertilise" name="when_to_fertilise"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('when_to_fertilise', $plantType->when_to_fertilise) }}"
                            placeholder="when..." />
                        </div>                        
        
                        
        
                        <div class="my-4">
                            <x-input.label for="competitor" :value="__('competitor')" />
                            <x-input.text id="competitor" name="competitor"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('competitor', $plantType->competitor) }}"
                            placeholder="strength..." />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="competition_period" :value="__('competition_period')" />
                            <x-input.text id="competition_period" name="competition_period"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('competition_period', $plantType->competition_period) }}"
                            placeholder="when..." />
                        </div>
        
                        <div class="my-4">
                            <x-input.label for="companions" :value="__('companions')" />
                            <x-input.text id="companions" name="companions"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ old('companions', $plantType->companions) }}"
                            placeholder="plant type..." />
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