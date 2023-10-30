<x-layout>
    <x-slot:title>
        Edit Plan entry 
    </x-slot:title>
    
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

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
                {{-- action="{{ route('family.update', $family->id) }}" --}}
                action="{{ route('plan.update', ['plan'=>$plan] ) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- <div>today: {{ $today->format('d M Y') }} </div>
                sown: {{ $plan->sown->format('d M Y') }} --}}
                <div class="my-4">
                    <x-input.label for="succession_id" :value="__('Name')" />
                    <x-input.text name="succession_id" id="succession_id"
                        value="{{ $plan->succession_id }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                    {{-- <select id="plant_type_id" name="plant_type_id" 
                        class="bg-white block border w-full h-10 text-xl outline-none
                        px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        <option value="{{ $plantType->id }}" {{ old('plant_type_id') == $plantType->id ? 'selected' : '' }}>
                            {{ $plantType->name }}
                        </option>
                    </select> --}}
                </div>

                <div class="my-4">
                    <x-input.label for="locn_growing" :value="__('Latin Name')" />
                    <x-input.text type="text" name="locn_growing" id="locn_growing"
                        value="{{ $plan->locn_growing }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                    {{-- <select id="plant_type_id" name="plant_type_id" 
                        class="bg-white block border w-full h-10 text-xl outline-none
                        px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                        @foreach ($varieties as $variety)
                            <option value="{{ $variety->id }}" {{ old('variety_id') == $variety->id ? 'selected' : '' }}>
                                {{ $variety->name }}
                            </option>
                        @endforeach
                    </select> --}}
                </div>

                <div class="my-4">
                    {{-- <x-input.label for="description" :value="__('Description')" />
                    <x-input.textarea name="description"
                        placeholder=""
                        :value="$family->description"
                        class="p-3 bg-white block border w-full h-60 text-2xl outline-none" /> --}}
                </div>

                <button
                    type="submit"
                    class="uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Family
                </button>
            </form>
        </div>
    </div>
</x-layout>