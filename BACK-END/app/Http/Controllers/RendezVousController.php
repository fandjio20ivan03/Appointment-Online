<?php

namespace App\Http\Controllers;

use App\Models\Rendez_vous;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {

        return response()->json(Rendez_vous::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $rendez_vous = Rendez_vous::create($request->all());
        return response($rendez_vous,201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // dd($rendez_vous);
         $rendez_vous = Rendez_vous::find($id);
        if(is_null($id)){
            return response()->json(['message'=> 'rendez_vous introuvable'],404);
        }
        return response()->json(['message' => 'dtdtffjfjfjfjfj'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rendez_vous $rendez_vous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $rendez_vous)
    {
        //
        $rendez_vous = Rendez_vous::find($rendez_vous);
        if(is_null($rendez_vous)){
            return response()->json(['message'=> 'rendez_vous introuvable'],404);

        }
        $rendez_vous->update($request->all());
        return response($rendez_vous,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $rendez_vous)
    {
        // dd($rendez_vous);
       $rendez_vous = Rendez_vous::find($rendez_vous);
        if(is_null($rendez_vous)){
            return response()->json(['message'=> 'rendez_vous introuvable'],404);

        }
        $rendez_vous->delete();
        // dd('ok');
        return response()->json(['message'=> 'rendez_vous supprimer'], 200);
    }

}
