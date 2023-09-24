<x-layout>
    <x-slot:title>
        Edit PlantType {{ $plantType->name }}
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
                action="{{ route('plantType.update', ['plantType'=>$plantType] ) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-input-label for="name" :value="__('Name')" />
                <x-text-input name="name" id="name"
                    value="{{ $plantType->name }}"
                    class="bg-white block border w-full h-10 text-2xl outline-none" />

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

                <div class="my-4">
                    <x-input-label for="name" :value="__('Latin Name')" />
                    <x-text-input type="text" name="latin"
                        value="{{ $plantType->latin }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
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