<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // la verification de l'heure de debut et celui de fin se fait en front
        $calendriers = Calendrier::orderBy('date')->take(7)->get();

        if(empty($calendriers))
        {
            return response()->json(["message" => "calendrier vide"],404);
        }

        return response()->json($calendriers,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'date' => 'date | required',
            'heure_debut' => 'required',
            'heure_fin' => 'required'
        ]);

        if($validated)
        {
            Calendrier::create($validated);
            return response()->json(["message" => "date ajoutés avec succes"],200);
        }
        return response()->json(["message" => "erreur de validation des donnees"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $calendrier = Calendrier::findOrFail($id);

        if(empty($calendrier))
        {
            return response()->json(["message" => "date introuvable"], 404);
        }
        return response()->json($calendrier,200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendrier $calendrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $date = Calendrier::findOrFail($id);
        if(empty($date))
        {
            return reponse()->json(["message" => "date introuvable"],404);
        }

        $validated = $request->validate([
            'date' => 'date | required',
            'heure_debut' => 'required',
            'heure_fin' => 'required'
        ]);

        $date->update($validated);
        $date->save();
        return response()->json(["message" => "bonne mise à jour"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $date = Calendrier::findOrFail($id);
        if(empty($date))
        {
            return response()->json(["massage" => "date introuvable"],404);
        }
        $date->delete();
        return response()->json(["massage" => "bonne suppression"],200);
    }
}
