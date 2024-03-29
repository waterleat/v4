<x-layout>
    <x-slot:title>
        Create Variety page
    </x-slot:title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="m-auto pt-20">
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
                action="{{ route('variety.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div>
                <x-input.label for="name" :value="__('Variety name')" class=""/>
                <x-input.text id="name" name="name"
                    autocomplete="off" placeholder="Variety name..." 
                    class="bg-white block border w-full h-10 text-2xl outline-none" value="{{ old('name') }}" />
                </div>

                <div>
                    <x-input.label for="plantType" :value="__('Plant type')" />
                    <select id="plantType" name="plant_type_id" 
                        class="bg-white block border w-full h-10 text-xl outline-none
                        px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option diabled selected value="">--Pick plant type--</option>
                        @foreach ( $plantTypes as $plantType )
                            <option value="{{ $plantType->id }}" {{ $plantType->id === old('plantType') ? 'selected' : ''}}>{{ $plantType->name }}</option>
                        @endforeach
                    </select>

                </div>

                <x-input.label for="info" :value="__('Info')" class=""/>
                <x-input.text id="info"  name="info"
                    autocomplete="off"
                    placeholder="Info..." 
                    class="bg-white block border w-full h-10 text-2xl outline-none" value="{{ old('info') }}" />

                <x-input.label for="description" :value="__('Description')" class=""/>
                <x-input.textarea id="description" name="description"
                    placeholder="Describe the plant..."
                    class="p-3 bg-white block border w-full h-60 text-2xl outline-none" value="{{ old('description') }}" />

                <div class="flex pb-8 justify-around">
                    <div class="w-40 my-4">
                        <x-input.label for="height" :value="__('Height (m)')" />
                        <x-input.text id="height" name="height"
                            type="number" min="0" step="0.05" max="10"
                            placeholder="Height..."
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" value="{{ old('height') }}" />
                    </div>
                    <div class="w-40 my-4">
                        <x-input.label for="spread" :value="__('Spread (m)')" />
                        <x-input.text id="spread" name="spread"
                            type="number" min="0" step="0.05" max="10"
                            placeholder="Spread..."
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" value="{{ old('spread') }}" />
                    </div>
                    <div class="w-40 my-4">
                        <x-input.label for="days2maturity" :value="__('Days to Maturity')" />
                        <x-input.text id="days2maturity" name="days2maturity"
                            type="number"
                            placeholder="days..." 
                            class="p-3 bg-white block border w-full h-10 text-2xl outline-none" value="{{ old('days2maturity') }}" />
                    </div>
                </div>


                <div class="flex my-4">
                    <div class="w-1/2 px-4">
                        <x-input.label for="sow_direct" :value="__('sow_direct')" />
                        <x-input.text id="sow_direct" name="sow_direct"
                            type="checkbox" value="{{ old('sow_direct') }}"
                            class="p-3 bg-white block border w-10 h-10 text-2xl outline-none" />
                    </div>
                    
                    <div class="w-1/2 px-4">
                        <x-input.label for="multisow" :value="__('multisow')" />
                        <x-input.text id="multisow" name="multisow"
                            type="number" placeholder="number"
                            class="p-3 bg-white block border w-20 h-10 text-2xl outline-none" value="{{ old('multisow') }}" />
                    </div>
                </div>
                    
                <div class="">
                    <div class="my-4">
                        <x-input.label for="sowing" :value="__('sowing')" />
                        <x-input.text id="sowing" name="sowing"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off"
                        placeholder="months..." value="{{ old('sowing') }}" />
                    </div>
                    
                    <div class="my-4">
                        <x-input.label for="harvest" :value="__('harvest')" />
                        <x-input.text id="harvest" name="harvest"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off"
                        placeholder="months..." value="{{ old('harvest') }}" />
                    </div>

                    <div class="my-4">
                        <x-input.label for="store" :value="__('store')" />
                        <x-input.text id="store" name="store"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off"
                        placeholder="months..." value="{{ old('store') }}" />
                    </div>
                </div>
                    
            </div>




                {{-- <label for="is_published" class="text-gray-500 text-2xl">
                    Is Published
                </label>
                <input
                    type="checkbox"
                    class="bg-transparent  border-b-2 inline text-2xl outline-none"
                    name="is_published"> --}}

                {{-- <textarea
                    name="body"
                    placeholder="Body..."
                    class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea> --}}
                    
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