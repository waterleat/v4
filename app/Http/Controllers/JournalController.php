<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Models\Journal;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\Variety;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('journal.index', [
            'journals' => Journal::all(),
            'plantTypes' => PlantType::all(),
            'varieties' => Variety::all(),
            'successions' => Succession::all(),
        ]);
    }

    /**
     * setup for creating new journal
     */
    public function newSowing( $sid)
    {
        // dd($sid);
        $today = Carbon::today();
        $succession = Succession::find($sid);
        $plantType = PlantType::find($succession->plant_type_id);
        $varieties = Variety::all()->where('plant_type_id', $plantType->id);
        return view('journal.create', [
            'plantType' => $plantType,
            'varieties' => $varieties,
            'succession' => $succession,
            'today' => $today,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = Carbon::today();
        $succession = Succession::find(1);
        $plantType = PlantType::find($succession->plant_type_id);
        $varieties = Variety::all()->where('plant_type_id', $plantType->id);
        return view('journal.create', [
            'plantType' => $plantType,
            'varieties' => $varieties,
            'succession' => $succession,
            'today' => $today,
        ]);
        // $sid = att;
        // $succession = Succession::find($succession->id);
        // dd($succession);

        // $valid = DB::table('successions')
        // ->where('sow_start', '<=', date_format(today(), 'z'))
        // ->where(function ( $query) {
        //     $query->where('sow_end', '>=', date_format(today(), 'z'));
        // })
        // ->get();
                        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJournalRequest $request)
    {
        // dd($request);
        // dd($request->validated());

        $journal = Journal::create($request->validated());
        // dd($journal);
        return redirect('/journal/'. $journal->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        // $journal = Journal::find($journal->id);
        $succession = Succession::find($journal->succession_id);
        $plantType = PlantType::find($succession->plant_type_id);
        $variety = Variety::find($journal->variety_id);

        return view('journal.show', [
            // 'journal' => Journal::find($journal->id),
            'journal' => $journal,
            'plantType' => $plantType,
            'variety' => $variety,
            'succession' => $succession,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        $today = Carbon::today();
        $succession = Succession::find($journal->succession_id);
        $plantType = PlantType::find($succession->plant_type_id);
        // $variety = Variety::find($journal->variety_id);
        $varieties = Variety::all()->where('plant_type_id', $plantType->id);

        return view('journal.edit', [
            // 'journal' => Journal::find($journal->id),
            'journal' => $journal,
            'plantType' => $plantType,
            'varieties' => $varieties,
            'succession' => $succession,
            'today' => $today,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        $journal->update($request->validated());
        return redirect('/journal/'. $journal->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {
        $journal->delete();
        return redirect('journal');
    }
}
