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
                {{-- {{ dd($errors) }} --}}
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
                <x-input-label for="name" :value="__('Variety name')" class=""/>
                <x-text-input id="name" class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none"
                            type="text"
                            name="name"
                            autocomplete="off"
                            placeholder="Variety name..." />
                </div>

                <div>
                    <x-input-label for="family" :value="__('Family')" />
                    <x-select-input id="family" name="family" 
                            :options="$options" class="bg-red-500"/>
                </div>

                <x-input-label for="latin" :value="__('Latin name')" class=""/>
                <x-text-input id="latin" class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none"
                            type="text"
                            name="latin"
                            autocomplete="off"
                            placeholder="Latin name..." />

                <x-input-label for="description" :value="__('Description')" class=""/>
                <x-textarea-input id="description" name="description"
                    placeholder="Describe the plant..."
                    class=" bg-transparent block border-b-2 w-full h-40 text-xl outline-none">
                </x-textarea-input>

                <div class="flex pb-8">
                    {{-- ffffffffff
                    <div>
                        <input id="height" name="height" 
                        type="number" min="0" step="0.1" max="10"
                        placeholder="Height..."
                        class="focus:bg-green-100 block border-b-2 w-full h-20 text-2xl outline-none" >
                    </div> --}}
                    <div>
                        <x-input-label for="height" :value="__('Height (m)')" />
                        <x-text-input id="height" name="height"
                            type="number" min="0" step="0.1" max="10"
                            placeholder="Height..."
                            class="focus:bg-green-100 block border-b-2 w-full h-20 text-2xl outline-none" />
                    </div>
                    <div>
                        <x-input-label for="spread" :value="__('Spread (m)')" />
                        <x-text-input id="spread" name="spread"
                            type="number" min="0" step="0.1" max="10"
                            placeholder="Spread..."
                            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" />
                    </div>
                    <div>
                        <x-input-label for="days2maturity" :value="__('Days to Maturity')" />
                        <x-text-input id="days2maturity" name="days2maturity"
                            type="number"
                            placeholder="days..." 
                            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" />
                    </div>
                </div>


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
                    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Variety
                </button>
            </form>
        </div>
    </div>
</x-layout>