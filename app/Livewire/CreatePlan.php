<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Models\Succession;
use Carbon\Carbon;
use Livewire\Component;

class CreatePlan extends Component
{
    public $sid;

    // public $url;

    public function addPlan()
    {
        $succession = Succession::find($this->sid);

        $today = Carbon::now();
        // dd($this->doyToDate($succession->plant_end, null)->diffInDays($today));
        $year = ($this->doyToDate($succession->plant_end, null)->diffInDays($today) < -7) ? getdate()['year'] + 1 : null;

        $hs = $this->doyToDate($succession->harvest_start, $year);
        $he = $this->doyToDate($succession->harvest_end, $year);
        $hend = ($he->diffInDays($hs) > 0) ? $he->addYear() : $he;
        // dd($hs,$he, $he->diffInDays($hs),  $hend);
        $data = [
            'succession_id' => $succession->id,
            'sow_start' => $this->doyToDate($succession->sow_start, $year),
            'sow_end' => $this->doyToDate($succession->sow_end, $year),
            'plant_start' => $this->doyToDate($succession->plant_start, $year),
            'plant_end' => $this->doyToDate($succession->plant_end, $year),
            'harvest_start' => $hs,
            'harvest_end' => $hend,
            'days_nursery' => $succession->days_nursery,
            'days_maturity' => $succession->days_maturity,
            'days_harvest' => $succession->days_harvest,
            // 'plan_status_id' => 'planned',
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
