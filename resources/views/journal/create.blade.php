<x-layout>
    <x-slot:title>
        Create Journal page
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
                action="{{ route('journal.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="plan_id" name="plan_id" value="{{ $plan->id }}">
                <div class="my-4 flex justify-around">
                    <div class="">
                        <x-input.label for="sown[]" :value="__('Sowing Date')" />
                        <x-input.text type="date" name="sown[]" 
                            class="bg-white block border w-full h-10 text-xl outline-none
                            px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                            value="{{ old('sown', $today->format('Y-m-d')) }}" />
                    </div>
                    <div>
                        <x-input.label for="sow_direct" :value="__('Direct Sown')" />
                        <x-input.text id="sow_direct" name="sow_direct"
                            type="checkbox"
                            class="p-3 bg-white block border w-10 h-10 text-2xl outline-none" />
                    </div>
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
                    <div class="w-1/4">
                        <x-input.label for="nursey_locn_id" :value="__('variety Name')" />
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
                </div>



                <button
                type="submit"
                class="uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Journal
                </button>
            </form>
        </div>
    </div>
</x-layout>            