<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantTypeRequest;
use App\Models\Family;
use App\Models\PlantType;
use App\Models\SuccessionType;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PlantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantTypes = PlantType::all()->sortBy(['name', 'asc']);

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
        $validated = $request->validated();
        // dd($validated);
        if ($request->hasFile('germ_temp_img')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('germtemp', request()->file('germ_temp_img'));
            $validated['germ_temp_img'] = $filePath;
        }
        if ($request->hasFile('plant_type_img')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('planttype', request()->file('plant_type_img'));
            $validated['plant_type_img'] = $filePath;
        }

        PlantType::create($validated);
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
        // dd($request);
        $validated = $request->validated();

        if ($request->hasFile('germ_temp_img')) {
            // delete old copy
            if ($plantType->germ_temp_img) {
                Storage::disk('public')->delete($plantType->germ_temp_img);
            }
            $filePath = Storage::disk('public')->put('germtemp', request()->file('germ_temp_img'), 'public');
            $validated['germ_temp_img'] = $filePath;
        }
        if ($request->hasFile('plant_type_img')) {
            // delete old copy
            if ($plantType->plant_type_img) {
                Storage::disk('public')->delete($plantType->plant_type_img);
            }
            $filePath = Storage::disk('public')->put('planttype', request()->file('plant_type_img'), 'public');
            $validated['plant_type_img'] = $filePath;
        }

        $plantType->update($validated);

        return Redirect(route('plantType.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantType $plantType)
    {
        if ($plantType->germ_temp_img) {
            Storage::disk('public')->delete($plantType->germ_temp_img);
        }
        if ($plantType->plant_type_img) {
            Storage::disk('public')->delete($plantType->plant_type_img);
        }
        
        $plantType->delete();

        return redirect(route('plantType.index'))->with('message', 'PlantType has been deleted');
    }
}
