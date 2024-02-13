<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dj;
use App\Models\Kantua;

class DjController extends Controller
{
    public function store(Request $request){
        $request->validate(['izena'=>'required']);
        $request->validate(['adina'=>'required']);

        $dj = new Dj();
        $dj->izena = $request->izena;
        $dj->adina = $request->adina;
        $dj->save();

        return redirect()->route('dj');
    }

    public function index(Request $request){
        $dj = Dj::all();
        return view('dj.index',['djs' => $dj]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dj = Dj::find($id);
        $kantuak = Kantua::where('dj_id', $id)->get();

        return view('dj.show', ['dj' => $dj, 'kantuak' => $kantuak]);
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
        $dj = Dj::find($id);
        $dj->izena = $request->izena;
        $dj->adina = $request->adina;

        $dj->save();

        return redirect()->route('dj')->with('success','dj ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dj = Dj::find($id);

       
        $dj->delete();

        return redirect()->route('dj')->with('success','dj ezabatu da');
    }
}
