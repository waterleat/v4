<x-layout>
    <x-slot:title>
        Create PlantType page
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
                action="{{ route('plantType.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name"
                    class="bg-white block border w-full h-10 text-2xl outline-none"
                    autocomplete="off"
                    placeholder="Common name..." />

                <div class="my-4">
                    <x-input-label for="family" :value="__('Family')" />
                    <select id="family" name="family_id" 
                    class="bg-white block border w-full h-10 text-xl outline-none
                    px-3 pt-1 border-green-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option>--Pick plant family--</option>
                        @foreach ( $families as $family )
                            <option value="{{ $family->id }}" >{{ $family->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-4">
                    <x-input-label for="name" :value="__('Latin Name')" />
                    <x-text-input id="latin" 
                        type="text"
                        name="latin"
                        class="bg-white block border w-full h-10 text-2xl outline-none"
                            autocomplete="off"
                            placeholder="Latin name..." />
                    {{-- <input
                    type="text"
                    name="latin"
                    value="{{ $plantType->latin }}"
                    class="bg-white block border-b-2 w-full h-10 text-2xl outline-none"> --}}
                </div>


                {{-- <input
                type="text"
                name="latin"
                placeholder="Latin name..."
                class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <textarea
                name="description"
                placeholder="Description..."
                class="py-10 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea> --}}

                {{-- <label for="is_published" class="text-gray-500 text-2xl">
                    Is Published
                </label>
                <input
                    type="checkbox"
                    class="bg-transparent  border-b-2 inline text-2xl outline-none"
                    name="is_published"> --}}

                {{-- <input
                    type="text"
                    name="excerpt"
                    placeholder="Excerpt..."
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none"> --}}

                {{-- <input
                    type="number"
                    name="min_to_read"
                    placeholder="Minutes to read..."
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none"> --}}

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
                    class="uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit PlantType
                </button>
            </form>
        </div>
    </div>
</x-layout>