<x-layout>
    <x-slot:title>
        Edit Plan entry 
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
                action="{{ route('plan.update', $plan->id) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" id="succession_id" name="succession_id" value="{{ $succession->id }}">

                <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ">
                    {{ $plan->succession->successionType->name }}: {{ $plan->succession->plantType->name }}
                </h2>

                {{-- <div class="w-1/4">
                    <x-input.label for="plant_type_id" :value="__('Plant Type')" />
                    <select id="plant_type_id" name="plant_type_id" 
                        class="bg-white block border w-full h-10 text-xl outline-none
                        px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option value="{{ $plantType->id }}" {{ old('plant_type_id') == $plantType->id ? 'selected' : '' }}>
                            {{ $plantType->name }}
                        </option>
                    </select>
                </div> --}}

                {{-- {{ dd($plan->sow_start->format('d/m/Y')) }} --}}
                <div class="flex">
                    <div class="w-1/6">
                        <p>{{ $plan->sow_start->format('d/m/Y') }}</p>
                        <x-input.label for="sow_start" :value="__('sow start')" />
                        <x-input.text type="date" name="sow_start" id="sow_start" value="{{ old('sow_start', $plan->sow_start->format('Y-m-d')) }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $plan->sow_end->format('d M Y') }}</p>
                        <x-input.label for="sow_end" :value="__('sow end')" />
                        <x-input.text type="date" name="sow_end" id="sow_end" value="{{ old('sow_end', $plan->sow_end->format('Y-m-d')) }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $plan->plant_start->format('d M Y') }}</p>
                        <x-input.label for="plant_start" :value="__('plant start')" />
                        <x-input.text type="date" name="plant_start" id="plant_start" value="{{ old('plant_start', $plan->plant_start->format('Y-m-d')) }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $plan->plant_end->format('d M Y') }}</p>
                        <x-input.label for="plant_end" :value="__('plant end')" />
                        <x-input.text type="date" name="plant_end" id="plant_end" value="{{ old('plant_end', $plan->plant_end->format('Y-m-d')) }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $plan->harvest_start->format('d M Y') }}</p>
                        <x-input.label for="harvest_start" :value="__('harvest start')" />
                        <x-input.text type="date" name="harvest_start" id="harvest_start" value="{{ old('harvest_start', $plan->harvest_start->format('Y-m-d')) }}" />
                    </div>
                    <div class="w-1/6">
                        <p>{{ $plan->harvest_end->format('d M Y') }}</p>
                        <x-input.label for="harvest_end" :value="__('harvest end')" />
                        <x-input.text type="date" name="harvest_end" id="harvest_end" value="{{ old('harvest_end', $plan->harvest_end->format('Y-m-d')) }}" />
                    </div>
                </div>

                <div class="flex pt-4">
                    <div class="w-1/3 flex">
                        <x-input.label for="days_nursery" :value="__('days in nursery')" />
                        <x-input.text type="number" id="days_nursery" name="days_nursery" class="w-40 ml-3" value="{{ old('days_nursery', $plan->days_nursey) }}" />
                    </div>
                    <div class="w-1/3 flex">
                        <x-input.label for="days_maturity" :value="__('days to maturity')" />
                        <x-input.text type="number" id="days_maturity" name="days_maturity" class="w-40 ml-3" value="{{ old('days_maturity', $plan->days_nursey) }}" />
                    </div>
                    <div class="w-1/3 flex">
                        <x-input.label for="days_harvest" :value="__('days of harvest')" />
                        <x-input.text type="number" id="days_harvest" name="days_harvest" class="w-40 ml-3" value="{{ old('days_harvest', $plan->days_nursey) }}" />
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