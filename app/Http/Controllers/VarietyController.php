<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Variety;
use Illuminate\Http\Request;

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
        $families = Family::all();
        // dd($families);
        foreach ($families as $family) {
            $options[$family->id] = $family->name;
            // [
            //     'id' => $family->id,
            //     'family' => $family->name,
            // ];
        }
        // dd($options);
        return view('variety.create', ['options' => $options]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'latin' => ['required'],
            'description' => ['required'],
        ]);
        Variety::create($data);
        return Redirect(route('variety.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Variety $variety)
    {
        return view('variety.show', ['variety' => $variety]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variety $variety)
    {
        return view('variety.edit', ['variety' => $variety]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variety $variety)
    {
        $data = $request->validate([
            'name' => ['required'],
            'latin' => ['required'],
            'description' => ['required'],
        ]);
        $variety->update($data);
        return Redirect(route('variety.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variety $variety)
    {
        $variety->delete() ;
        return redirect(route('variety.index'))->with('message', 'Variety has been deleted');
    }
}
