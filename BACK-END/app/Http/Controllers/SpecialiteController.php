<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Specialite::all(),200);
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
        Specialite::create($request->all());
      return response()->json(['message' => 'specialite cree avec success'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialite $id)
    {
        //
        $specialite = Specialite::find($id);
        if(is_null($specialite)){
           return response()->json(['message'=>'la specialte introuvale'],404);
        }
        return response()->json(Specialite::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialite $specialite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $specialite = Specialite::find($id);

        if(empty($specialite))
        {
            return response()->json(['message' => 'specialite introuvable'],404);
        }
        $specialite->spec_nom = $request->spec_nom;
        $specialite->medecin_id = $request->medecin_id;
        $specialite->save();
        return response()->json(['message' => 'specialite mis a jour'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */

    public function destroy($id)
    {
        //
        $specialite = Specialite::find($id);
        if(empty($specialite))
        {
            return response()->json(['message'=>'Specialite introuvable'],404);
        }
        $specialite->delete();
        return response()->json(['message' => 'suppression effectuer'],200);
    }
}
