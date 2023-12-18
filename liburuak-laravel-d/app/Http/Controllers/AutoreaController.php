<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorea;
use App\Models\Liburua;

class AutoreaController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate(['izena'=>'required|min:3']);
    
        $autorea = new Autorea();
        $autorea->izena = $request->izena;
        $autorea->save();
    
        return redirect()->route('autoreak')->with('success','autorea ondo gorde da');
    }

    public function index(Request $request){
        $autoreak = Autorea::all();
        return view('autoreak.index',['autoreak' => $autoreak]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autorea = Autorea::find($id);
        return view('autoreak.show',['autorea' => $autorea]);
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
        $autorea = Autorea::find($id);
        $autorea->izena = $request->izena;

        $autorea->save();

        return redirect()->route('autoreak')->with('success','autorea ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autorea = Autorea::find($id);
        // Find all books related to the author
        $liburuak = Liburua::where('autorea_id', $id)->get();

        // Delete each book
        foreach ($liburuak as $liburua) {
            $liburua->delete();
        }

        
        $autorea->delete();

        return redirect()->route('autoreak')->with('success','autorea ezabatu da');
    }
}
