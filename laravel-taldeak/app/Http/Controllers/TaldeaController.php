<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taldea;

class TaldeaController extends Controller
{
    public function store(Request $request){
        $request->validate(['izena'=>'required']);
        $request->validate(['liga'=>'required']);

        $taldea = new Taldea();
        $taldea->izena = $request->izena;
        $taldea->liga = $request->liga;
        $taldea->save();

        return redirect()->route('taldeak');
    }

    public function index(Request $request){
        $taldeak = Taldea::all();
        return view('taldeak.index',['taldeak' => $taldeak]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taldea = Taldea::find($id);

        return view('taldeak.show',['taldea' => $taldea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $taldea = Taldea::find($id);
        $taldea->izena = $request->izena;

        $taldea->save();

        return redirect()->route('taldeak')->with('success','taldea ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taldea = Taldea::find($id);

       
        $taldea->delete();

        return redirect()->route('taldeak')->with('success','taldea ezabatu da');
    }
}
