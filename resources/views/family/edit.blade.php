<x-layout>
    <x-slot:title>
        Edit Family {{ $family->name }}
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
                action="{{ route('family.update', ['family'=>$family] ) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="my-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input name="name" id="name"
                        value="{{ $family->name }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                </div>

                <div class="my-4">
                    <x-input-label for="name" :value="__('Latin Name')" />
                    <x-text-input type="text" name="latin"
                        value="{{ $family->latin }}"
                        class="bg-white block border w-full h-10 text-2xl outline-none" />
                </div>

                <div class="my-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea-input name="description"
                        placeholder=""
                        :value="$family->description"
                        class="p-3 bg-white block border w-full h-60 text-2xl outline-none" />
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