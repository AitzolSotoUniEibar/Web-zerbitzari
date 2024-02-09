<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jokalaria;
use App\Models\Taldea;

class JokalariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jokalariak = Jokalaria::all();
        $taldeak = Taldea::all();
        return view('jokalaria.index',['taldeak' => $taldeak,'jokalariak' => $jokalariak]);
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
        //
        $request->validate([
            'izena' => 'required|min:3',
            'adina' => 'required',
            'taldea' => 'required'
        ]);
    
        $jokalaria = new Jokalaria();
        $jokalaria->izena = $request->izena;
        $jokalaria->taldea_id = $request->taldea;
        $jokalaria->adina = $request->adina;
        $jokalaria->save();
    
        return redirect()->route('jokalaria.index')->with('success','jokalaria ondo gorde da');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $taldeak = Taldea::all();
        $jokalaria = Jokalaria::find($id);
        return view('jokalaria.show',['jokalaria' => $jokalaria,'taldeak' => $taldeak]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'izena' => 'required|min:3',
            'adina' => 'required',
            'taldea' => 'required'
        ]);
    
        $jokalaria = Jokalaria::find($id);
        $jokalaria->izena = $request->izena;
        $jokalaria->taldea_id = $request->taldea;
        $jokalaria->adina = $request->adina;
        $jokalaria->save();
    
        return redirect()->route('jokalaria.index')->with('success','jokalaria ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $jokalaria = Jokalaria::find($id);
        $jokalaria->delete();

        return redirect()->route('jokalaria.index')->with('success', 'jokalaria ezabatu da');
    }
}
