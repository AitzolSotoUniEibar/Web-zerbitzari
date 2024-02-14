<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alokairua;
use App\Models\Yate;

class AlokairuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alokairua = Alokairua::all();
        $yates = Yate::all();
        return view('alokairua.index',['yates' => $yates,'alokairuak' => $alokairua]);
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
            'yate' => 'required'
        ]);
    
        $alokairua = new Alokairua();
        $alokairua->izena = $request->izena;
        $alokairua->yate_id = $request->yate;
        $alokairua->save();
    
        return redirect()->route('alokairua.index')->with('success','alokairua ondo gorde da');
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
        $yate = Yate::all();
        $alokairua = Alokairua::find($id);
        return view('alokairua.show',['alokairua' => $alokairua,'yates' => $yate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'izena' => 'required|min:3',
            'yate' => 'required'
        ]);
    
        $alokairua = Alokairua::find($id);
        $alokairua->izena = $request->izena;
        $alokairua->yate_id = $request->yate;
        $alokairua->save();
        $alokairua->save();
    
        return redirect()->route('alokairua.index')->with('success','alokairua ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $alokairua = Alokairua::find($id);
        $alokairua->delete();

        return redirect()->route('alokairua.index')->with('success', 'alokairua ezabatu da');
    }
}
