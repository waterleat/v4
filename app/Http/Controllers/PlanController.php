<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Journal;
use App\Models\Variety;
use App\Models\Location;
use App\Models\PlantType;
use App\Models\PlanStatus;
use App\Models\Succession;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;

// use Illuminate\Support\Carbon;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::now();

        $sorted = Plan::all()->sortBy([
            ['sow_start', 'asc'],
            ['harvest_end', 'asc'],
        ]);
        // $first = $sorted->first();
        $active = $sorted->where('harvest_end', '>', $today);

        return view('plan.index', [
            'plans' => Plan::all(),
            'sorted' => $sorted,
            'planStatuses' => PlanStatus::all(),
            'today' => $today,
            'doy' => Carbon::createMidnightDate($today->year, 1, 1)->diffInDays($today, false),
        ]);
        // $doy = $jan->diffInDays($today, false);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }
    public function addSuccession($sid)
    {
        $succession = Succession::find($sid);
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
            // 'status' => 'Planned',
        ];
        // dd($data);
        $plan = Plan::create($data);

        return Redirect(route('succession.show', $succession->id));

        // $plantType = PlantType::find($succession->plant_type_id);
        // $varieties = Variety::all()->where('plant_type_id', $plantType->id);
        // return view('plan.create', [
        //     'succession' => $succession,
        //     'plantType' => $plantType,
        //     'varieties' => $varieties,
        //     'sow_start' => $this->doyToDate($succession->sow_start),
        //     'sow_end' => $this->doyToDate($succession->sow_end),
        //     'plant_start' => $this->doyToDate($succession->plant_start),
        //     'plant_end' => $this->doyToDate($succession->plant_end),
        //     'harvest_start' => $this->doyToDate($succession->harvest_start),
        //     'harvest_end' => $this->doyToDate($succession->harvest_end),
        //     'days_nursery' => $succession->days_nursery ?: 28,
        //     'days_maturity' => $succession->days_maturity ?: 60,
        //     'days_harvest' => $succession->days_harvest ?: 40,
        // ]);
    }

    public function doyToDate(int $doy)
    {
        // dd($doy);
        $startOfYear = Carbon::createMidnightDate(null, 1, 1);

        return $startOfYear->addDays($doy);
    }

    public function addPlantType(PlantType $plantType)
    {
        // $response = $this->post('/plan', $plan1);

        // dd($plantType->successions());
        foreach ($plantType->successions() as $succession) {
            Plan::create(['succession_id' => $succession->id]);
            // $this->post('/plan', ['succession_id' => $succession->id]);
        }

        return view('plan.index', [
            'plans' => Plan::all(),
            // 'succesions' => Succession::all(),
            // 'plantTypes' => PlantType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        $plan = Plan::create($request->validated());

        return Redirect(route('plan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        // $journal = Journal::find($plan->journal_id);

        return view('plan.show', [
            'plan' => $plan,
            'locations' => Location::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        $succession = Succession::find($plan->succession_id);
        $plantType = PlantType::find($succession->plant_type_id);
        $varieties = Variety::all()->where('plant_type_id', $plantType->id);

        return view('plan.edit', [
            'plan' => $plan,
            'planStatuses' => PlanStatus::all(),
            'succession' => $succession,
            'plantType' => $plantType,
            'varieties' => $varieties,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        // dd($plan);
        // dd($request->validate([
        //     'succession_id' => [],
        //     'locn_growing' => [],
        // ]));

        $plan->update($request->validated());

        return Redirect(route('plan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();

        return Redirect(route('plan.index'));
    }
}
