<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kantua;
use App\Models\Dj;

class KantuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kantua = Kantua::all();
        $djs = Dj::all();
        return view('kantua.index',['djs' => $djs,'kantuak' => $kantua]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'izena' => 'required|min:3',
            'genero' => 'required',
            'iraupena' => 'required',
            'dj' => 'required'
        ]);
    
        $kantua = new Kantua();
        $kantua->izena = $request->izena;
        $kantua->dj_id = $request->dj;
        $kantua->genero = $request->genero;
        $kantua->iraupena = $request->iraupena;
        $kantua->save();
    
        return redirect()->route('kantua.index')->with('success','kantua ondo gorde da');
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
        //
        $dj = Dj::all();
        $kantua = Kantua::find($id);
        return view('kantua.show',['kantua' => $kantua,'djs' => $dj]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $request->validate([
            'izena' => 'required|min:3',
            'genero' => 'required',
            'iraupena' => 'required',
            'dj' => 'required'
        ]);
    
        $kantua = Kantua::find($id);
        $kantua->izena = $request->izena;
        $kantua->dj_id = $request->dj;
        $kantua->genero = $request->genero;
        $kantua->iraupena = $request->iraupena;
        $kantua->save();
    
        return redirect()->route('kantua.index')->with('success','kantua ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //
        $kantua = Kantua::find($id);
        $kantua->delete();

        return redirect()->route('kantua.index')->with('success', 'kantua ezabatu da');
    }
}
