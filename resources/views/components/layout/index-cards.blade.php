<div>
    <section {{ $attributes->merge(['class' =>' mb-3 px-2 bg-white py-3 rounded-lg drop-shadow-xl']) }}>
    {{-- <div class="   "> --}}
        {{ $slot }}
    {{-- </div> --}}
    </section>
</div>