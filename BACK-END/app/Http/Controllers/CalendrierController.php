<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
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
    public function store(Request $request)
    {
        // validation des donnees de la requete

        $validator = Validator::make($request->all(),
        [
            'date' => 'date | required',
            'heure_debut' => 'required | before:'.$request->input('heure_fin'),
            'heure_fin' => 'required',
        ],
        [
            'required' => 'l\'attribut :attrubute est requis.',
            'date' => 'l\'attribut :attribute doit etre valide.',
        ]);

        if($validator->fails())
        {
            return response()->json(["message" => "erreur de validation des donnees"],201); // $validator en param de la mothode json pour recupere les messages appropries
        }

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
    public function update(Request $request, $id)
    {

        $date = Calendrier::find($id);
        if(empty($date))
        {
            return reponse()->json(["message" => "date introuvable"],404);

        }
        $validator = Validator::make($request->all(),
        [
            'date' => 'date | required',
            'heure_debut' => 'required | before:'.$request->input('heure_fin'),  // $validator en param de la mothode json pour recupere les messages appropries
            'heure_fin' => 'required',
        ],
        [
            'required' => 'l\'attribut :attrubute est requis.',
            'date' => 'l\'attribut :attribute doit etre valide.',
        ]);

        if($validator->fails())
        {
            return response()->json($validator,201);
        }
        $date->update($request->all());
        $date->save();
        return response()->json(['message' => 'bonne mise à jour'],200);

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
