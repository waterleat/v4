<?php

namespace App\Http\Controllers;

use App\Http\Requests\VarietyRequest;
use App\Models\PlantType;
use App\Models\Variety;

class VarietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $varieties = Variety::all();

        return view('variety.index', ['varieties' => $varieties]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plantTypes = PlantType::all();

        return view('variety.create', ['plantTypes' => $plantTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VarietyRequest $request)
    {
        Variety::create($request->validated());

        return Redirect(route('variety.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Variety $variety)
    {
        $plantType = PlantType::find($variety->plant_type_id);

        return view('variety.show', [
            'variety' => $variety,
            'plantType' => $plantType,
            'journals' => $variety->successions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variety $variety)
    {
        $plantTypes = PlantType::all();

        return view('variety.edit', [
            'variety' => $variety,
            'plantTypes' => $plantTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VarietyRequest $request, Variety $variety)
    {
        $variety->update($request->validated());

        return Redirect(route('variety.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variety $variety)
    {
        $variety->delete();

        return redirect(route('variety.index'))->with('message', 'Variety has been deleted');
    }
}
