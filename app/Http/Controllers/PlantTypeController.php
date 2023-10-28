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
        // dd(storage_path('app') . "/$path");
        // $plantType->update(['germ_temp_img' => storage_path('app') . "/$path"]);
        // dd($plantType);
        // dd($request->validated());
        // dd($request->file('germ_temp_img'));
        // dd($path);
        
        $data = $request->validated();
        // $filename = $request->getSchemeAndHttpHost() . $plantType->name . $request->germ_temp_img->extension() ;
        // $filename = $plantType->name . $request->germ_temp_img->extension() ;
        // // dd($img);
        // $request->germ_temp_img->move(public_path('images', $filename));
        // $data['germ_temp_img'] =  storage_path('app') . "/$path";
        $data['germ_temp_img'] =  $path;
        // dd($data['germ_temp_img']);
        $plantType->update($data);
        // $request['germ_temp_img'] = $request->germ_temp_img->getClientOriginalName();    //filename() . "." . $request->germ_temp_img->extension();
        return Redirect(route('plantType.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantType $plantType)
    {
        $plantType->delete() ;
        // PlantType::destroy($id);
        return redirect(route('plantType.index'))->with('message', 'PlantType has been deleted');
    }
}
