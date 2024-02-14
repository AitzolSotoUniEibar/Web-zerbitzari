<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yate;

class YateController extends Controller
{
    //NORMAL
    public function store(Request $request){
        $request->validate(['izena'=>'required']);
        $request->validate(['urtea'=>'required']);
        $request->validate(['kopurua'=>'required']);

        $yate = new Yate();
        $yate->izena = $request->izena;
        $yate->urtea = $request->urtea;
        $yate->kopurua = $request->kopurua;
        $yate->save();

        return redirect()->route('yateak');
    }

    public function index(Request $request){
        $yateak = Yate::all();
        return view('yateak.index',['yateak' => $yateak]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $yate = Yate::find($id);

        return view('yateak.show', ['yate' => $yate]);
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
        $yate = yate::find($id);
        $yate->izena = $request->izena;
        $yate->urtea = $request->urtea;
        $yate->kopurua = $request->kopurua;
        $yate->save();

        return redirect()->route('yateak')->with('success','yatea ondo eguneratu da');
    }

    //API
    public function index_api(){

        $yateak = Yate::all();
        return response()->json($yateak, 200);
    }

    public function show_api(string $id){
        $yate = Yate::find($id);
        return response()->json($yate, 200);
    }

    public function delete(string $id){
        $yate = Yate::find($id);

        $yate->delete();

        return response()->json(null, 204);
    }
}
