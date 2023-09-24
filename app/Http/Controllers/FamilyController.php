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
        $families = Family::all();
        return view('family.index', ['families' => $families]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('family.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Family::create($request->validated());
        return Redirect(route('family.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        return view('family.show', ['family' => $family]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return view('family.edit', [
            'family' => $family
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $family->update($request->validated());
        return Redirect(route('family.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete() ;
        return redirect(route('family.index'))
            ->with('message', 'Family has been deleted');
    }
}
