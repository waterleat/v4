<x-layout>
    <x-slot:title>
        Show PlantType page
    </x-slot:title>

    <div class=" mx-10 pb-20">
        <div class="flex">
            <div class="w-3/5 ">
                <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ">
                    {{ $plan->succession->successionType->name }}: {{ $plan->succession->plantType->name }}
                </h2>
                <h3 class="text-2xl px-4 py-2 bg-amber-500">{{ $plan->id }}</h3>
            </div>
            <div class="w-2/5 pt-10 text-center">
                
                <a href="{{ route('plan.edit', $plan->id) }}"
                    class="mt-8 uppercase mt-15 bg-green-400 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Edit
                </a>
                
            </div>
        </div>
        <div class="pt-8">
            <table>
                <thead>
                    <tr>
                        <th class="px-2">sow start</th>
                        <th class="px-2">sow end</th>
                        <th class="px-2">plant start</th>
                        <th class="px-2">plant end</th>
                        <th class="px-2">harvest start</th>
                        <th class="px-2">harvest end</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-2">{{ $plan->sow_start->format('d M') }}</td>
                        <td class="px-2">{{ $plan->sow_end->format('d M') }}</td>
                        <td class="px-2">{{ $plan->plant_start->format('d M') }}</td>
                        <td class="px-2">{{ $plan->plant_end->format('d M') }}</td>
                        <td class="px-2">{{ $plan->harvest_start->format('d M') }}</td>
                        <td class="px-2">{{ $plan->harvest_end->format('d M') }}</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>days_nursery</td>
                        <td class="px-2">{{ $plan->days_nursery }} days</td>
                        <td>days_maturity</td>
                        <td class="px-2">{{ $plan->days_maturity }} days</td>
                        <td>days_harvest</td>
                        <td class="px-2">{{ $plan->days_harvest }} days</td>
                    </tr>
                </tbody>
            </table>
            
            <div class="my-4">canvas goes here</div>

            <h4 class="text-xl font-semibold">Journal details</h4>
            <div class="pl-4">
                <p>sown on {{ $plan->sown }} at {{ $plan->locn_sowing }}</p>
                <p>germinated on {{ $plan->germinated }} now in {{ $plan->locn_nursery }}</p>
                <p>planted on {{ $plan->planted }} in {{ $plan->locn_growing }}</p>
                <p>first cropped on {{ $plan->first_cropped }}</p>
                <p>until {{ $plan->last_cropped }}</p>
            </div>
        </div>
    </div>
</x-layout>