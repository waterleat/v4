<?php

namespace App\Http\Controllers;

use App\Http\Requests\SucccessionRequest;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;
use App\Models\Variety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuccessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $successionTypes = SuccessionType::all();
        $successions = Succession::all();
        $plantTypes = PlantType::all();
        return view('succession.index', [
            'successionTypes' => $successionTypes,
            'successions' => $successions,
            'plantTypes' => $plantTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $successionTypes = SuccessionType::all();
        $plantTypes = PlantType::all();
        // $successions = Succession::all();
        $varieties = Variety::all();
        return view('succession.create', [
            'successionTypes' => $successionTypes,
            'plantTypes' => $plantTypes,
            'varieties' => $varieties,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SucccessionRequest $request)
    {
        Succession::create($request->validated());
        return redirect(route('succession.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Succession $succession)
    {
        $successionTypes = SuccessionType::all();
        $plantTypes = PlantType::all();
        return view('succession.show', [
            'plantTypes' => $plantTypes,
            'successionTypes' => $successionTypes,
            'succession' => $succession,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Succession $succession)
    {
        $successionTypes = SuccessionType::all();
        $plantTypes = PlantType::all();
        $varieties = Variety::all();
        return view('succession.edit', [
            'plantTypes' => $plantTypes,
            'successionTypes' => $successionTypes,
            'succession' => $succession,
            'varieties' => $varieties,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SucccessionRequest $request, Succession $succession)
    {
        $succession->update($request->validated());
        return redirect(route('succession.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Succession $succession)
    {
        $succession->delete() ;
        return redirect(route('succession.index'))
            ->with('message', 'Succession has been deleted');
    }
    
    
    
    /**
     * 
     * 
     * 
     * 
     */
    public function sowtoday( )
    {
        $plantTypes = PlantType::all();
        $successionTypes = SuccessionType::all();
        $valid = DB::table('successions')
        ->where('sow_start', '<=', date_format(today(), 'z'))
        ->where(function ( $query) {
            $query->where('sow_end', '>=', date_format(today(), 'z'));
        })
        ->get();
        return view('succession.sowtoday', [
            'plantTypes' => $plantTypes,
            'successionTypes' => $successionTypes,
            'sowings' => $valid,
        ]);
    }
}