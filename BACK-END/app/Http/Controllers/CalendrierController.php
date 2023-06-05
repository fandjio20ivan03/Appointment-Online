<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use App\Http\Requests\Calendrier\CalendrierRequest;

class CalendrierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   // recuperation des dates en classement par ordre croissant
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
    public function store(CalendrierRequest $request)
    {
        // validation des donnees de la requete
        Calendrier::create($request->all());
        return response()->json(["message" => "date ajoutés avec succes"],200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $date = Calendrier::find($id);
        if(empty($date))
        {
            return response()->json(["message" => "date introuvable"], 404);
        }
        return response()->json($date,200);

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
    public function update(CalendrierRequest $request, $id)
    {
        $date = Calendrier::find($id);
        if(empty($date))
        {
            return response()->json(["message" => "date introuvable"],404);
        }
        $date->update($request->all());
        $date->save();
        return response()->json(['message' => 'modification effectue avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $date = Calendrier::find($id);
        if(empty($date))
        {
            return response()->json(["massage" => "date introuvable"],404);
        }
        $date->delete();
        return response()->json(["massage" => "bonne suppression"],200);
    }
}
