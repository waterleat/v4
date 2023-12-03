<x-layout>
    <x-slot:title>
        Create Plans page
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
                action="{{ route('plan.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="succession_id" name="succession_id" value="{{ $succession->id }}">


                <div class="w-1/4">
                    <x-input.label for="plant_type_id" :value="__('Plant Type')" />
                    <select id="plant_type_id" name="plant_type_id" 
                        class="bg-white block border w-full h-10 text-xl outline-none
                        px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option value="{{ $plantType->id }}" {{ old('plant_type_id') == $plantType->id ? 'selected' : '' }}>
                            {{ $plantType->name }}
                        </option>
                    </select>
                </div>
                <div class="flex">
                    <div class="w-1/6">
                        <p>{{ $sow_start->format('d M Y') }}</p>
                        <x-input.label for="sow_start" :value="__('sow start')" />
                        <input type="date" name="sow_start" id="sow_start" value="{{ $sow_start->format('d M Y') }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $sow_end->format('d M Y') }}</p>
                        <x-input.label for="sow_end" :value="__('sow end')" />
                        <input type="date" name="sow_end" id="sow_end" value="{{ $sow_end->format('d M Y') }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $plant_start->format('d M Y') }}</p>
                        <x-input.label for="plant_start" :value="__('plant start')" />
                        <input type="date" name="plant_start" id="plant_start" value="{{ $plant_start->format('d M Y') }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $plant_end->format('d M Y') }}</p>
                        <x-input.label for="plant_end" :value="__('plant end')" />
                        <input type="date" name="plant_end" id="plant_end" value="{{ $plant_end->format('d M Y') }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $harvest_start->format('d M Y') }}</p>
                        <x-input.label for="harvest_start" :value="__('harvest start')" />
                        <input type="date" name="harvest_start" id="harvest_start" value="{{ $harvest_start->format('d M Y') }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $harvest_end->format('d M Y') }}</p>
                        <x-input.label for="harvest_end" :value="__('harvest end')" />
                        <input type="date" name="harvest_end" id="harvest_end" value="{{ $harvest_end->format('d M Y') }}" />
                    </div>
                </div>
                <div class="w-1/4">
                    <x-input.label for="variety_id" :value="__('variety Name')" />
                    <select id="variety_id" name="variety_id" 
                        class="bg-white block border w-full h-10 text-xl outline-none
                        px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option value="">-- variety sown --</option>
                        @foreach ($varieties as $variety)
                            <option value="{{ $variety->id }}" {{ old('variety_id') == $variety->id ? 'selected' : '' }}>
                                {{ $variety->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="mt-8 uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Journal
                </button>
            </form>
        </div>
    </div>
</x-layout>            