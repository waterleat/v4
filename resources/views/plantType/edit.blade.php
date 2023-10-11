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
                {{-- {{ dd($errors) }} --}}
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
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input name="name" id="name"
                            value="{{ $plantType->name }}"
                            class="bg-white block border w-full h-10 text-2xl outline-none" />
                        </div>
        
                        <div class="my-4">
                            <x-input-label for="name" :value="__('Latin Name')" />
                            <x-text-input type="text" name="latin"
                                value="{{ $plantType->latin }}"
                                class="bg-white block border w-full h-10 text-2xl outline-none" />
                        </div>
                    </div>
                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input-label for="family_id" :value="__('Family')" />
                            <select id="family_id" name="family_id" 
                            class="bg-white block border w-full h-10 text-xl outline-none
                            px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option>--Pick plant family--</option>
                                @foreach ( $families as $family )
                                    <option value="{{ $family->id }}" 
                                    @if ($family->id == old('family_id', $plantType->family_id))
                                        selected="selected"
                                    @endif
                                    >{{ $family->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-10 my-4">
                            <x-input-label for="perennial" :value="__('Perennial')" />
                            <input name="perennial" id="perennial"
                            type="checkbox" value="1"
                            class="appearance-none bg-white block border w-full h-10 text-2xl outline-none
                            border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            {{ $plantType->perennial ? 'checked' : '' }} 
                            >
                        </div>
                    </div>
                </div>


                <div class="my-4 flex">
                    <div class="w-1/2 px-4">
                        <x-input-label for="dates_best_sow" :value="__('dates_best_sow')" />
                        <x-text-input id="dates_best_sow" name="dates_best_sow"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        value="{{ $plantType->dates_best_sow }}"
                        />
                    </div>
    
                    <div class="w-1/2 px-4">
                        <x-input-label for="dates_main_harvest" :value="__('dates_main_harvest')" />
                        <x-text-input id="dates_main_harvest" name="dates_main_harvest"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        value="{{ $plantType->dates_main_harvest }}"
                        />
                    </div>
                </div>


                <div class="flex my-4">
                    <div class="w-1/2 px-4">
                        <div class="w-10 my-4">
                            <x-input-label for="multisow" :value="__('multisow')" />
                            <input id="multisow" name="multisow"
                                type="checkbox" value="1"
                                class="appearance-none bg-white block border  h-10 w-10 text-2xl outline-none
                                border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                {{ $plantType->cd ? 'checked' : '' }} 
                                >
                            </div>
                        
                        <div class="my-4">
                            <x-input-label for="hardiness_young_plants" :value="__('hardiness_young_plants')" />
                            <x-text-input id="hardiness_young_plants" name="hardiness_young_plants"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->hardiness_young_plants }}"
                            placeholder="Common name..." />
                        </div>
    
                        <div class="my-4">
                            <x-input-label for="root_depth" :value="__('root_depth')" />
                            <x-text-input id="root_depth" name="root_depth"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->root_depth }}"
                            placeholder="Common name..." />
                        </div>
                        
                        <div class="my-4">
                            <x-input-label for="interplant_into" :value="__('interplant_into')" />
                            <x-text-input id="interplant_into" name="interplant_into"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->interplant_into }}"
                            placeholder="Common name..." />
                        </div>
    
                        <div class="my-4">
                            <x-input-label for="interplant_with" :value="__('interplant_with')" />
                            <x-text-input id="interplant_with" name="interplant_with"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->interplant_with }}"
                            placeholder="Common name..." />
                        </div>
    
                        <div class="my-4">
                            <x-input-label for="relay_plant_into" :value="__('relay_plant_into')" />
                            <x-text-input id="relay_plant_into" name="relay_plant_into"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->relay_plant_into }}"
                            placeholder="Common name..." />
                        </div>
    
                        <div class="my-4">
                            <x-input-label for="relay_plant_with" :value="__('relay_plant_with')" />
                            <x-text-input id="relay_plant_with" name="relay_plant_with"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->relay_plant_with }}"
                            placeholder="Common name..." />
                        </div>
                    </div>
    
                    <div class="w-1/2 px-4">
                        <div class="my-4">
                            <x-input-label for="mulch" :value="__('mulch')" />
                            <x-text-input id="mulch" name="mulch"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->mulch }}"
                            placeholder="Common name..." />
                        </div>
        
                        <div class="my-4">
                            <x-input-label for="feeder_type" :value="__('feeder_type')" />
                            <x-text-input id="feeder_type" name="feeder_type"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->feeder_type }}"
                            placeholder="Common name..." />
                        </div>
                        
                        <div class="my-4">
                            <x-input-label for="fertiliser" :value="__('fertiliser')" />
                            <x-text-input id="fertiliser" name="fertiliser"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->fertiliser }}"
                            placeholder="Common name..." />
                        </div>
        
                        <div class="my-4">
                            <x-input-label for="when_to_fertilise" :value="__('when_to_fertilise')" />
                            <x-text-input id="when_to_fertilise" name="when_to_fertilise"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->when_to_fertilise }}"
                            placeholder="Common name..." />
                        </div>                        
        
                        
        
                        <div class="my-4">
                            <x-input-label for="competitor" :value="__('competitor')" />
                            <x-text-input id="competitor" name="competitor"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->competitor }}"
                            placeholder="Common name..." />
                        </div>
        
                        <div class="my-4">
                            <x-input-label for="competition_period" :value="__('competition_period')" />
                            <x-text-input id="competition_period" name="competition_period"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->competition_period }}"
                            placeholder="Common name..." />
                        </div>
        
                        <div class="my-4">
                            <x-input-label for="companions" :value="__('companions')" />
                            <x-text-input id="companions" name="companions"
                            class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            value="{{ $plantType->companions }}"
                            placeholder="Common name..." />
                        </div>
    
                    </div>
                </div>



                {{-- <textarea
                name="description"
                placeholder=""
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $plantType->description }}</textarea> --}}


                <button
                    type="submit"
                    class="uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit PlantType
                </button>
            </form>
        </div>
    </div>
</x-layout>