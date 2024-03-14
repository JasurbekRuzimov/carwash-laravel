<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoykaRequest;
use App\Models\Moyka;
use Illuminate\Http\Request;

class MoykaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moykalar = Moyka::all()->sortByDesc('id');
        return view('moyka.index', compact('moykalar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('moyka.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $m = new Moyka();
        $m->name = $request->name;
        $m->address = $request->address;
        $m->save();
        return redirect()->route('moyka.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $m = Moyka::find($id);
        return view('moyka.edit', ['moyka' => $m]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MoykaRequest $request, string $id)
    {
        $m = Moyka::find($id);
        $m->name = $request->name;
        $m->address = $request->address;
        $m->save();
        return redirect()->route('moyka.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $m = Moyka::find($id);
        $m->delete();
        return redirect()->route('moyka.index');
    }
}
