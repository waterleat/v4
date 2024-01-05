<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Variety;
use Livewire\Component;
use App\Models\Location;

class PlanList extends Component
{
    public $selectedPlanSowing;
    public $selectedPlanGermination;
    public $selectedPlanTransplanted;
    public $selectedPlanPlanted;
    public $selectedPlanHarvesting;
    public $selectedPlanFinished;
    
    public function mount()
    {
        
    }

    public function sowSeeds(Plan $plan): void
    {
        $this->selectedPlanSowing = $plan->id;
        $this->selectedPlanGermination = $plan->id;
    }

    public function germinateSeeds(Plan $plan): void
    {
        $this->selectedPlanGermination = $plan->id;
    }

    public function transplantSeedlingss(Plan $plan): void
    {
        $this->selectedPlanTransplanted = $plan->id;
    }

    public function plantSeedlings(Plan $plan): void
    {
        $this->selectedPlanSowing = $plan->id;
    }

    public function firstHarvest(Plan $plan): void
    {
        $this->selectedPlanSowing = $plan->id;
    }

    public function finished(Plan $plan): void
    {
        $this->selectedPlanSowing = $plan->id;
    }

    public function render()
    {
        $today = Carbon::now();

        return view('livewire.plan-list', [
            'today' => $today,
            'doy' => Carbon::createMidnightDate($today->year, 1, 1)->diffInDays($today, false),
            'varieties' => Variety::all(),
            'locations' => Location::all(),
            'sorted' => Plan::all()->sortBy([
                ['sow_start', 'asc'],
                ['harvest_end', 'asc'],
            ]),
        ]);
    }
}
