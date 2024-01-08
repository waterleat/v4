<?php

namespace App\Livewire;

use App\Models\Plan;
use Carbon\Carbon;
use Livewire\Component;

class SowSeeds extends Component
{
    public $pid;

    public function addJournal()
    {
        // dd($this->pid);
        $plan = Plan::find($this->pid);
        // dd($plan);

        $today = Carbon::now();
        $value = $this->pid;
// dd($value);
        $this->dispatch('open-modal', name:'sow-seeds');

        // $data = [
        //     'plan_id' => $plan->id,
        //     'sown' => $today,
        //     // 'variety_id' => $variety,
        // ];
    }

    public function render()
    {
        return view('livewire.sow-seeds');
    }
}
