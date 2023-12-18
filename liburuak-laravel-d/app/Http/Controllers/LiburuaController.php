<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liburua;
use App\Models\Autorea;

class LiburuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $liburuak = Liburua::all();
        $autoreak = Autorea::all();
        return view('liburua.index',['liburuak' => $liburuak, 'autoreak' => $autoreak]);
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
            'deskribapena' => 'required',
            'autorea' => 'required'
        ]);
    
        $liburua = new Liburua();
        $liburua->izena = $request->izena;
        $liburua->autorea_id = $request->autorea;
        $liburua->deskribapena = $request->deskribapena;
        $liburua->save();
    
        return redirect()->route('liburua.index')->with('success','liburua ondo gorde da');
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
        $autoreak = Autorea::all();
        $liburua = Liburua::find($id);
        return view('liburua.show',['liburua' => $liburua,'autoreak' => $autoreak]);
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
            'deskribapena' => 'required',
            'autorea' => 'required'
        ]);
    
        $liburua = Liburua::find($id);
        $liburua->izena = $request->izena;
        $liburua->autorea_id = $request->autorea;
        $liburua->deskribapena = $request->deskribapena;
        $liburua->save();
    
        return redirect()->route('liburua.index')->with('success','liburua ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $liburua = Liburua::find($id);
        $liburua->delete();

        return redirect()->route('liburua.index')->with('success', 'liburua ezabatua');
    }
}
