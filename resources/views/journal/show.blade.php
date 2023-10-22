<x-layout>
    <x-slot:title>
        Show Journal page
    </x-slot:title>

    <div class=" mx-10 pb-20">

        {{ $plantType->name }}


        <table>
            <tbody>
                <tr>
                    <td>sown</td>
                    <td>planted</td>
                    <td>first</td>
                    <td>last</td>
                </tr>
                <tr>
                    <td>{{ date_format($journal->sown, 'd M Y') }}</td>
                    <td class="{{ ($journal->planted) ? : "bg-blue-300" }}">
                        {{ ($journal->planted) ? $journal->planted->format('d M Y') : $journal->estimatedCropingDate($succession->days_nursery) }}</td>
                    <td class="{{ ($journal->first_harvest) ? : "bg-blue-300" }}">
                        {{ ($journal->first_harvest) ?: $journal->estimatedCropingDate($succession->days_maturity) }}</td>
                    <td class="{{ ($journal->last_harvest) ? : "bg-blue-300" }}">
                        {{ ($journal->last_harvest) ?: $journal->estimatedCropingDate($succession->days_maturity + $succession->days_harvest) }}</td>
                </tr>
            </tbody>
        </table>

        <h3 class="text-2xl">start seeds :</h3>
        <p class="">{{ $succession->start_seeds }}</p>
        <h3 class="text-2xl">grow seedlings :</h3>
        <p class="">{{ $succession->grow_seedlings }}</p>
        <h3 class="text-2xl">planting density :</h3>
        <p class="">{{ $succession->planting_density }}</p>
        <h3 class="text-2xl">growing notes :</h3>
        <p class="">{{ $succession->growing_notes }}</p>
        <h3 class="text-2xl">yield_notes :</h3>
        <p class="">{{ $succession->yield_notes }}</p>
        <h3 class="text-2xl">variety notes :</h3>
        <p class="">{{ $succession->variety_notes }}</p>
        <h3 class="text-2xl">varieties recommended :</h3>
        <p class="">{{ $succession->varieties_recommended }}</p>
    </div>

</x-layout>
