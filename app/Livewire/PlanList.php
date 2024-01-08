<?php

namespace App\Livewire;

use App\Models\Journal;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Variety;
use Livewire\Component;
use App\Models\Location;
use Livewire\Attributes\Rule;

class PlanList extends Component
{
    public $selectedPlanLocation;
    #[Rule([])]
    public $editLocn;

    public $selectedPlanSowing;
    public $selectedPlanGermination;
    // public $selectedPlanTransplanted;
    // public $selectedPlanPlanted;
    // public $selectedPlanHarvesting;
    // public $selectedPlanFinished;

    #[Rule(['required', 'date'])]
    public $sownDate;

    #[Rule(['required', 'integer'])]
    public $variety_id;

    #[Rule(['required'])]
    // #[Rule([ 'gte:1'])]
    public $sowing_location;

    #[Rule([])]
    public $sow_direct;

    #[Rule([])]
    public $multi;

    #[Rule([])]
    public $cells;

    #[Rule([])]
    public $notes;


    public function mount()
    {
    }

    public function render()
    {
        $today = Carbon::today();
        return view('livewire.plan-list', [
            'today' => $today,
            'doy' => Carbon::createMidnightDate($today->year, 1, 1)->diffInDays($today, false),
            'varieties' => Variety::all(),
            'locations' => Location::all(),
            'sorted' => Plan::all()->sortBy([
                ['plan_status_id', 'desc'],
                ['sow_start', 'asc'],
                ['harvest_end', 'asc'],
            ]),
        ]);
    }
    
    public function changeGrowLocn(Plan $plan): void
    {
        $this->selectedPlanLocation = $plan->id;
        $this->editLocn = $plan->locn_growing;
    }
    public function createLocn()
    {
        $validated = $this->validateOnly('editLocn');
        // dd($validated);
        Plan::find($this->selectedPlanLocation)->update([
            'locn_growing' => $validated['editLocn'],
        ]);
        $this->cancelLocn();
    }
    public function cancelLocn()
    {
        $this->reset('selectedPlanLocation', 'editLocn');
    }

    public function sowSeeds(Plan $plan): void
    {
        $this->selectedPlanSowing = $plan->id;
        $journal = Journal::all()->where('plan_id', $plan->id);
        // dd($journal);
        $journal->whenEmpty(function () {
            $this->sownDate = Carbon::today()->format('Y-m-d');
        }, function ($journal) {
            $this->sownDate = $journal->first()->sown->format('Y-m-d');
            $this->variety_id = $journal->first()->variety_id;
            $this->sowing_location = $journal->first()->sowing_locn;
        });
    }
    public function createSowing()
    {
        $validated = $this->validate();
        // dd($validated);
        $plan = Plan::find($this->selectedPlanSowing);
        
        $sownX = Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00');
        $sownCD = Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00');
        // $se = $sownCD->addDays($plan->days_nursery - 7);
        // $c = Carbon::createMidnightDate($parsed->year(),$parsed->month(),$parsed->day());
        // dump($validated['sownDate'],$sownX->format('Y-m-d'), $sownCD, $se); // , $sownD->addDays($plan->days_nursery - 7));

        $j =[
            'plan_id' => $this->selectedPlanSowing,
            'sown' => $validated['sownDate'],
            'variety_id' => $validated['variety_id'],
            'sown_direct' => $validated['sow_direct'],
            'location_id' => $validated['sowing_location'],
            'sowing_locn' => $validated['sowing_location'],
            'growing_locn' => ($validated['sow_direct']) ? $validated['sowing_location'] : null,
        ];
        $journal = Journal::create($j);

        $a =[
            'plan_status_id' => 2,
            'sow_start' => $validated['sownDate'],
            'harvest_start' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity),
            'harvest_end'   => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity + $plan->days_harvest),
        ];

        if ($validated['sownDate']) {
            $p = array_merge($a, 
            [
                'sow_end' => $validated['sownDate'],
                'plant_start' => $validated['sownDate'],
                'plant_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity),
                'locn_growing' => $validated['sowing_location'],
            ]);
        } else {
            $p = array_merge($a, 
            [
                'sow_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery - 7),
                'plant_start' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery - 7),
                'plant_end' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery + 7),
            ]);
        }
        // $plan->update([
        // $p =[
        //     // 'sown' => $sown,
        //     // 'locn_sowing' => $validated['sowing_location'],
        //     'plan_status_id' => 2,

        //     'sow_start' => $validated['sownDate'],

        //     'sow_end'       => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery - 7),
        //     'plant_start'   => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery - 7),
        //     'plant_end'     => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_nursery + 7),
        //     'harvest_start' => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity),
        //     'harvest_end'   => Carbon::createFromFormat('Y-m-d h:i:s', $validated['sownDate'].' 00:00:00')->addDays($plan->days_maturity + $plan->days_harvest),
        //     // 'journal_id' => $journal->id,
        // ];
        $plan->update($p);
        // dd($validated, $j, $p); 
        $this->cancelSowing();
    }
    public function cancelSowing()
    {
        return redirect(request()->header('Referer'));
    }

    // public function germinateSeeds(Plan $plan): void
    // {
    //     $this->selectedPlanGermination = $plan->id;
    // }

    // public function transplantSeedlingss(Plan $plan): void
    // {
    //     $this->selectedPlanTransplanted = $plan->id;
    // }

    // public function plantSeedlings(Plan $plan): void
    // {
    //     $this->selectedPlanSowing = $plan->id;
    // }

    // public function firstHarvest(Plan $plan): void
    // {
    //     $this->selectedPlanSowing = $plan->id;
    // }

    // public function finished(Plan $plan): void
    // {
    //     $this->selectedPlanSowing = $plan->id;
    // }
}
