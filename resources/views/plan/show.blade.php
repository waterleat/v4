<x-layout>
    <x-slot:title>
        Show Plan page
    </x-slot:title>

    <div class=" mx-10 pb-20">
        <div class="flex">
            <div class="w-3/5 ">
                <h2 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 ">
                    {{ $plan->succession->successionType->name }}: {{ $plan->succession->plantType->name }}
                </h2>
                <h3 class="text-2xl px-4 py-2 bg-amber-500">{{ $plan->planStatus->name }}</h3>
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

            <div class="flex">
                <div class="w-5/12">
                    <h3 class="text-lg font-semibold">Plant Data</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td><h4 class="text-lg w-36">Germination</h4></td>
                                <td class=""><img width="216" alt="temp graph"
                                    src="{{ asset('storage/germtemp/'.$plan->succession->plantType->germ_temp_img) }}"></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-36">Multisow</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->multisow }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-36">Hardiness</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->hardiness_young_plants }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-36">Root depth</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->root_depth }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-48">Competitor</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->competitor }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-48">Competition period</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->competition_period }}</p></td>
                            </tr>
                            <tr>
                                <td>Perennial</td>
                                <td>{{ ($plan->succession->plantType->perennial) ? "Yes" : "No" }}</td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-48">Mulch</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->mulch }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-48">Feeder type</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->feeder_type }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-48">Fertiliser</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->fertiliser }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-48">When to fertilise</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->when_to_fertilise }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-36">Interplant into</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->interplant_into }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-36">Interplant with</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->interplant_with }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-36">Relay into</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->relay_plant_into }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-36">Relay with</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->relay_plant_with }}</p></td>
                            </tr>
                            <tr>
                                <td><h4 class="text-lg w-48">companions</h4></td>
                                <td><p class="">{{ $plan->succession->plantType->companions }}</p>
                            </tr>
                            </tbody>
                    </table>
                </div>
                <div class="w-3/12 ml-6">
                    <h3 class="text-lg font-semibold">Succession Data</h3>
                    <table>
                        <tr>
                            <th class="px-2">sow start</th>
                            <td class="px-2">{{ $plan->sow_start->format('d M') }}</td>
                        </tr>
                        <tr>
                            <th class="px-2">sow end</th>
                            <td class="px-2">{{ $plan->sow_end->format('d M') }}</td>
                        </tr>
                        <tr>
                            <th class="px-2">plant start</th>
                            <td class="px-2">{{ $plan->plant_start->format('d M') }}</td>
                        </tr>
                        <tr>
                            <th class="px-2">plant end</th>
                            <td class="px-2">{{ $plan->plant_end->format('d M') }}</td>
                            
                        </tr>
                        <tr>
                            <th class="px-2">harvest start</th>
                            <td class="px-2">{{ $plan->harvest_start->format('d M') }}</td>
                            
                        </tr>
                        <tr>
                            <th class="px-2">harvest end</th>
                            <td class="px-2">{{ $plan->harvest_end->format('d M') }}</td>

                        </tr>
                        <tr>
                            <td>days_nursery</td>
                            <td class="px-2">{{ $plan->days_nursery }} days</td>
                        </tr>
                        <tr>
                            <td>days_maturity</td>
                            <td class="px-2">{{ $plan->days_maturity }} days</td>

                        </tr>
                        <tr>
                            <td>days_harvest</td>
                            <td class="px-2">{{ $plan->days_harvest }} days</td>
                        </tr>
                        </table>
                </div>
                {{-- {{ dd($locations) }} --}}
                <div class="w-1/3">
                    <h4 class="text-xl font-semibold">Journal details</h4>
                    <div class="pl-4">
                        <table>
                        @if ($plan->plan_status_id > 1)
                            <tr>
                                <td>sown on </td><td>{{ $plan->journal->sown->format('d M') }}</td>
                                <td>at</td><td>{{ $locations->find($plan->journal->sowing_locn)->name }}</td>
                            </tr>
                        @endif
                        @if ($plan->plan_status_id > 2)
                            <tr>
                                <td>germinated </td><td>{{ $plan->journal->germinated->format('d M') }}</td>
                                <td>now in</td><td>{{ $locations->find($plan->journal->nursery_locn)->name }}</td>
                            </tr>
                        @endif
                        @if ($plan->plan_status_id > 3)
                            <tr>
                                <td>planted out </td><td>{{ $plan->journal->planted->format('d M') }}</td>
                                <td>in</td><td>{{ $locations->find($plan->journal->growing_locn)->name }}</td>
                            </tr>
                        @endif
                        @if ($plan->plan_status_id > 5)
                            <tr>
                                <td>first cropped </td><td>{{ $plan->journal->first_harvest->format('d M') }}</td>
                            </tr>
                        @endif
                        @if ($plan->plan_status_id > 6)
                            <tr>
                                <td>until </td><td>{{ $plan->journal->last_harvest->format('d M') }}</td>
                            </tr>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>