<?php

namespace App\Livewire;

use App\Models\Journal;
use App\Models\Location;
use App\Models\Plan;
use App\Models\PlanStatus;
use App\Models\PlantType;
use App\Models\Variety;
use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TestList extends Component
{
    public $selectedPlanActions;
    public $selectedPlanLocation;
    public $selectedPlanSowing;
    public $selectedPlanGermination;
    // public $selectedPlanTransplanted;
    public $selectedPlanPlanted;
    // public $selectedPlanHarvesting;
    // public $selectedPlanFinished;

    public $editLocn;
    
    public $sownDate;
    public $variety_id;
    public $sowing_location;
    public $sow_direct;
    // public $multi;
    // public $cells;
    // public $notes;

    public $germinationDate;
    public $nursery_locn;

    public $plantedDate;
    public $growing_locn;
    

    public function mount()
    {
    }

    public function render()
    {
        $today = Carbon::today();

        return view('livewire.test-list',
            [
                'today' => $today,
                'doy' => Carbon::createMidnightDate($today->year, 1, 1)->diffInDays($today, false),
                // 'varieties' => Variety::pluck('id', 'name'),
                'locations' => Location::all(),
                // 'plan_statuses' => PlanStatus::all(),
                'sorted' => Plan::with('planStatus')->with('succession.plantType')->get()->sortBy([
                    ['plan_status_id', 'desc'],
                    ['harvest_end', 'asc'],
                    ['sow_start', 'asc'],
                ]),
            ]);
    }

    public function myActions(Plan $plan): void
    {
        $this->selectedPlanActions = $this->selectedPlanActions == $plan->id ? '' : $plan->id;
    }

    public function changeGrowLocn(Plan $plan): void
    {
        $this->selectedPlanLocation = $plan->id;
        $this->editLocn = $plan->locn_growing;
    }

    public function createLocn()
    {
        $rules = ['editLocn' => 'nullable'];
        $validated = $this->validate($rules);
        // dd($validated);
        Plan::find($this->selectedPlanLocation)->update([
            'locn_growing' => $validated['editLocn'],
        ]);
        $this->reset('selectedPlanLocation', 'editLocn');
        // $this->cancelForm();
    }

    public function cancelForm()
    {
        return redirect(request()->header('Referer'));
    }

    public function sowSeeds(Plan $plan): void
    {
        $this->selectedPlanSowing = $plan->id;
        $journal = Journal::where('plan_id', $plan->id)->first();
        
        if ($journal) {
            $this->sownDate = $journal->sown->format('Y-m-d');
            $this->variety_id = $journal->variety_id;
            $this->sow_direct = $journal->sown_direct;
            $this->sowing_location = $journal->sowing_locn;
        } else {
            $this->sownDate = Carbon::today()->format('Y-m-d');
            $this->sowing_location = '';
        }
    }

    public function createSowing()
    {
        $rules = [
            'sownDate' => 'required',
            'sowing_location' => 'required|integer',
            'variety_id' => 'required|integer',
            'sow_direct' => 'nullable',
        ];
        $validated = $this->validate($rules);
        
        $plan = Plan::find($this->selectedPlanSowing);

        $j = [
            'plan_id' => $this->selectedPlanSowing,
            'sown' => $validated['sownDate'],
            'variety_id' => $validated['variety_id'],
            'sown_direct' => $validated['sow_direct'] == null ? 0 : 1,
            'sowing_locn' => $validated['sowing_location'],
            'nursery_locn' => ($validated['sow_direct']) ? $validated['sowing_location'] : null,
            'growing_locn' => ($validated['sow_direct']) ? $validated['sowing_location'] : null,
        ];

        $common_plan = [
            'plan_status_id' => 2,
            'sow_start' => $validated['sownDate'],
            'harvest_start' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity),
            'harvest_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity + $plan->days_harvest),
        ];

        if ($validated['sow_direct']) {
            $p = array_merge($common_plan,
                [
                    'sow_end' => $validated['sownDate'],
                    'plant_start' => $validated['sownDate'],
                    'plant_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity),
                    'locn_growing' => $validated['sowing_location'],
                ]);
        } else {
            $p = array_merge($common_plan,
                [
                    'sow_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery - 7),
                    'plant_start' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery - 7),
                    'plant_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery + 7),
                ]);
        }
        
        // dd($validated, $j, $p);
        $journal = Journal::create($j);
        $plan->update($p);
        $this->cancelForm();
    }

    public function germinateSeeds(Plan $plan): void
    {
        $this->selectedPlanGermination = $plan->id;
        $journal = Journal::where('plan_id', $plan->id)->first();
        $this->germinationDate = $journal->germinated ? $journal->germinated->format('Y-m-d') : Carbon::today()->format('Y-m-d');
        $this->nursery_locn = $journal->nursery_locn ?: '';
    }

    public function createGermination()
    {
        $rules = [
            'germinationDate' => 'required',
            'nursery_locn' => 'required|integer',
        ];
        $validated = $this->validate($rules);
        
        $plan = Plan::find($this->selectedPlanGermination);
        $journal = Journal::where('plan_id', $plan->id)->first();

        $j = [
            'id' => $journal->id,
            'germinated' => $validated['germinationDate'],
            'nursery_locn' => $validated['nursery_locn'],
        ];
        
        $journal->update($j);
        $plan->update(['plan_status_id' => $journal->sown_direct == 1 ? 5 : 3]);

        $this->cancelForm();
    }

    // public function transplantSeedlingss(Plan $plan): void
    // {
    //     $this->selectedPlanTransplanted = $plan->id;
    // }

    public function plantSeedlings(Plan $plan): void
    {
        $this->selectedPlanPlanted = $plan->id;
        $journal = Journal::where('plan_id', $plan->id)->first();
        if ($journal){
            $this->plantedDate = $journal->planted ? $journal->planted->format('Y-m-d') : Carbon::today()->format('Y-m-d');
            $this->growing_locn = $journal->growing_locn ?: $plan->locn_growing ?: '';
        }else{
            $this->plantedDate = Carbon::today()->format('Y-m-d');
            $this->growing_locn = $plan->locn_growing ?: '';
        }

        // dd($journal);
    }

    public function createPlanted()
    {
        $rules = [
            'plantedDate' => 'required',
            'growing_locn' => 'required|integer',
        ];
        $validated = $this->validate($rules);
        
        $plan = Plan::find($this->selectedPlanPlanted);
        $journal = Journal::where('plan_id', $plan->id)->first();
        if ($journal){
            $j = [
                'id' => $journal->id,
                'planted' => $validated['plantedDate'],
                'growing_locn' => $validated['growing_locn'],
            ];
            $journal->update($j);
        }else{
            $j = [
                'plan_id' => $this->selectedPlanPlanted,
                'planted' => $validated['plantedDate'],
                'growing_locn' => $validated['growing_locn'],
            ];
            $journal = Journal::create($j);
        }

        // $carbonPlantedDate = Carbon::createFromFormat('Y-m-d h:i:s', $validated['plantedDate'].' 00:00:00');
        $p = [
            'plan_status_id' => 5,
            'locn_growing' => $validated['growing_locn'],
            'plant_start' => $validated['plantedDate'],
            'plant_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['plantedDate'].' 00:00:00')->subDays($plan->days_nursery)->addDays($plan->days_maturity),
            'harvest_start' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['plantedDate'].' 00:00:00')->subDays($plan->days_nursery)->addDays($plan->days_maturity),
            'harvest_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['plantedDate'].' 00:00:00')->subDays($plan->days_nursery)->addDays($plan->days_maturity + $plan->days_harvest),
        ];

        $plan->update($p);

        $this->cancelForm();
    }

    // public function firstHarvest(Plan $plan): void
    // {
    //     $this->selectedPlanSowing = $plan->id;
    // }

    // public function finished(Plan $plan): void
    // {
    //     $this->selectedPlanSowing = $plan->id;
    // }
}
