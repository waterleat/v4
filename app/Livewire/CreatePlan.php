<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Models\Succession;
use Carbon\Carbon;
use Livewire\Component;

class CreatePlan extends Component
{
    public $sid;

    public $url;

    public function addPlan()
    {
        $succession = Succession::find($this->sid);

        $today = Carbon::now();
        $year = ($this->doyToDate($succession->plant_end, null)->diffInDays($today) > 7) ? getdate()['year'] + 1 : null;

        $data = [
            'succession_id' => $succession->id,
            'sow_start' => $this->doyToDate($succession->sow_start, $year),
            'sow_end' => $this->doyToDate($succession->sow_end, $year),
            'plant_start' => $this->doyToDate($succession->plant_start, $year),
            'plant_end' => $this->doyToDate($succession->plant_end, $year),
            'harvest_start' => $this->doyToDate($succession->harvest_start, $year),
            'harvest_end' => $this->doyToDate($succession->harvest_end, $year),
            'days_nursery' => $succession->days_nursery,
            'days_maturity' => $succession->days_maturity,
            'days_harvest' => $succession->days_harvest,
            // 'status' => 'planned',
        ];

        $plan = Plan::create($data);
        session()->flash('status', 'Plan added successfully!');
    }

    public function doyToDate(int $doy, $year)
    {
        $startOfYear = Carbon::createMidnightDate($year, 1, 1);

        return $startOfYear->addDays($doy);
    }

    public function render()
    {
        return view('livewire.create-plan');
    }
}
