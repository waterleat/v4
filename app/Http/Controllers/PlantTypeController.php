<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantTypeRequest;
use App\Models\Family;
use App\Models\PlantType;
use App\Models\SuccessionType;
use Illuminate\Http\Request;

class PlantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantTypes = PlantType::all();
        return view('plantType.index', ['plantTypes' => $plantTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families = Family::all();
        return view('plantType.create', ['families' => $families]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlantTypeRequest $request)
    {
        PlantType::create($request->validated());
        return Redirect(route('plantType.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantType $plantType)
    {
        $family = Family::find($plantType->family_id);
        $successionTypes = SuccessionType::all();
        return view('plantType.show', [
            'plantType' => $plantType,
            'family' => $family,
            'successionTypes' => $successionTypes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlantType $plantType)
    {
        $families = Family::all();
        return view('plantType.edit', [
            'plantType' => $plantType,
            'families' => $families,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlantTypeRequest $request, PlantType $plantType)
    {
        $path = $request->file('germ_temp_img')->store('germtemp', 'public');
        
        $data = $request->validated();
        $data['germ_temp_img'] =  $path;
        $plantType->update($data);
        return Redirect(route('plantType.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantType $plantType)
    {
        $plantType->delete() ;
        return redirect(route('plantType.index'))->with('message', 'PlantType has been deleted');
    }
}
