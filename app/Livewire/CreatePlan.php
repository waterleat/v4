<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Plan;
use Livewire\Component;
use App\Models\Succession;

class CreatePlan extends Component
{
    public $sid;

    public $url;

    public function addPlan()
    {
        $succession = Succession::find($this->sid);
        $data = [
            'succession_id' => $succession->id,
            'sow_start' => $this->doyToDate($succession->sow_start),
            'sow_end' => $this->doyToDate($succession->sow_end),
            'plant_start' => $this->doyToDate($succession->plant_start),
            'plant_end' => $this->doyToDate($succession->plant_end),
            'harvest_start' => $this->doyToDate($succession->harvest_start),
            'harvest_end' => $this->doyToDate($succession->harvest_end),
            'days_nursery' => $succession->days_nursery,
            'days_maturity' => $succession->days_maturity,
            'days_harvest' => $succession->days_harvest,
            // 'status' => 'planned',
        ];
        // dd($data);
        $plan = Plan::create($data);
        session()->flash('status', 'Plan added successfully!');
        // return redirect()->to($this->url);
    }

    public function doyToDate(int $doy)
    {
        // dd($doy);
        $startOfYear = Carbon::createMidnightDate(null, 1, 1);
        return $startOfYear->addDays($doy);
    }

    public function render()
    {
        return view('livewire.create-plan');
    }
}
