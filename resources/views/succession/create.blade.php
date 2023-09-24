<x-layout>
    <x-slot:title>
        Create Succession page
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
                action="{{ route('succession.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <x-input-label for="succession_type_id" :value="__('Succession Type')" />
                <select id="succession_type_id" name="succession_type_id" 
                    class="bg-white block border w-full h-10 text-xl outline-none
                    px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                    <option>--Pick succession type--</option>
                    @foreach ( $successionTypes as $successionType )
                        <option value="{{ $successionType->id }}" >{{ $successionType->name }}</option>
                    @endforeach
                </select>

                <div>
                    <x-input-label for="plant_type_id" :value="__('Plant Type')" />
                    <select id="plant_type_id" name="plant_type_id" 
                        class="bg-white block border w-full h-10 text-xl outline-none
                        px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option>--Pick plant type--</option>
                        @foreach ( $plantTypes as $plantType )
                            <option value="{{ $plantType->id }}" >{{ $plantType->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                
                <div class="my-4">
                    <x-input-label for="sow" :value="__('Sow')" />
                    <x-text-input id="sow" name="sow"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off"
                        placeholder="Sow..." />
                </div>
                
                <div class="my-4">
                    <x-input-label for="plant" :value="__('Plant')" />
                    <x-text-input id="plant" name="plant"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off"
                        placeholder="Plant..." />
                </div>

                <div class="my-4">
                    <x-input-label for="firstHarvest" :value="__('First Harvest')" />
                    <x-text-input id="firstHarvest" name="firstHarvest"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off"
                        placeholder="First Harvest..." />
                </div>
                
                <div class="my-4">
                    <x-input-label for="lastHarvest" :value="__('Last Harvest')" />
                    <x-text-input id="lastHarvest" name="lastHarvest"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                        autocomplete="off"
                        placeholder="Last Harvest..." />
                </div>

                <button
                    type="submit"
                    class="uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Succession
                </button>
            </form>
        </div>
    </div>
</x-layout>