<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Http\Requests\Medecin\MedecinRequest;

class MedecinController extends Controller
{
    public function index()
    {
        //je retourne ici tous les patients de notre table avec un response json pour consommer en api en front-end
        return response()->json(Medecin::all(), 200);
    }

    public function create(MedecinRequest $request)
    {

    }

    public function store(MedecinRequest $request)
    {
         //fonction me permettant de sauvegarde les informations envoyer par le patient dans la base de donnees
         $medecin = $request->except('_token');
         Medecin::create($medecin);
         return response()->json(['message' => 'la creation est reussit avec succes'], 200);
    }

    public function show($id)
    {
        $medecin = Medecin::find($id);
        if(empty($medecin))
        {
            return response()->json(["message" => "medecin introuvable"], 404);
        }
        return response()->json($medecin,200);
    }

    public function edit(Medecin $medecin)
    {

    }

    public function update(MedecinRequest $request, $id)
    {
        $medecin = Medecin::find($id);
        if(empty($medecin))
        {
            return response()->json(["message" => "medecin introuvable"],404);
        }

        $medecin->update($request->all());
        $medecin->save();
        return response()->json(['message' => 'modification du medecin effectue avec succes'],200);
    }

    public function destroy($id)
    {
        $medecin = Medecin::find($id);
        if(empty($medecin))
        {
            return response()->json(["massage" => "medecin introuvable"],404);
        }
        $medecin->delete();
        return response()->json(["massage" => "bonne suppression du medecin"],200);
    }
}
