<x-layout>
    <x-slot:title>
        Edit Variety {{ $variety->name }}
    </x-slot:title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        Edit Variety {{ $variety->name }}
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
            <form class="bg-white p-4"
                action="{{ route('variety.update', ['variety' => $variety]) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <input
                type="text"
                name="name"
                value="{{ $variety->name }}"
                class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input
                type="text"
                name="latin"
                value="{{ $variety->latin }}"
                class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <textarea
                name="description"
                placeholder="Description..."
                class=" bg-transparent block border-b-2 w-full h-40 text-xl outline-none">{{ $variety->description }}</textarea>

                <div class="flex pb-8">
                    <div>
                        <x-input-label for="height" :value="__('Height (m)')" />
                        <input id="height" name="height"
                            type="number" min="0" step=0.1 max="10"
                            placeholder="Height..."
                            value="{{ $variety->height }}"
                            class="focus:bg-green-100 block border-b-2 w-full h-20 text-2xl outline-none" >
                    </div>

                    {{-- <div>
                        <label for="height" class="text-gray-500 text-2xl">
                            Height (m)
                        </label>
                        <input
                            type="number"
                            name="height"
                            value="{{ $variety->height }}"
                            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
                    </div> --}}
                    <div>
                        <label for="spread" class="text-gray-500 text-2xl">
                            Spread (m)
                        </label>
                        <input id="spread"  name="spread"
                            type="number" min="0" step=0.05 max="10"
                            value="{{ $variety->spread }}"
                            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
                    </div>
                    <div>
                        <label for="days2maturity" class="text-gray-500 text-2xl">
                            Days to Maturity
                        </label>
                        <input
                            type="number"
                            name="days2maturity"
                            value="{{ $variety->days2maturity }}"
                            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
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
                    class="uppercase mt-15 bg-green-500 text-indigo-700 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Variety
                </button>
            </form>
        </div>
    </div>
</x-layout>