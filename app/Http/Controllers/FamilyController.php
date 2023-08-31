<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $families = DB::table('families')->get();
        // return view('family.index')->with('families', $families);

        // $families = Family::orderby('id', 'desc')->get();
        // dd($families);

        $families = Family::all();

        // return view('family.index')->with('families', $families);
        return view('family.index', ['families' => $families]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('family.create');
        // return 'create page';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:families
            |max:255',
        ]);
        Family::create([
            'name' => $request->name,
        ]);
        return Redirect(route('family.index'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(Family $family)
    public function show($id)
    {
        // return $id;
        $family = Family::find($id);
        // dd($family);
        return view('family.show', ['family' => $family]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Family $family)
    public function edit($id)
    {
        return view('family.edit', [
            'family' => Family::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Family $family)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:families,name',
        ]);

        Family::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));
        return Redirect(route('family.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Family $family)
    public function destroy($id)
    {
        Family::destroy($id);
        return redirect(route('family.index'))->with('message', 'Family has been deleted');
    }
}
