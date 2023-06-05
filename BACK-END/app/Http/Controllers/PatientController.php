<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\CreatePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //je retourne ici tous les patients de notre table avec un response json pour consommer en api en front-end
        return response()->json(Patient::all(), 200);
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
    public function store(CreatePatientRequest $request)
    {
        //fonction me permettant de sauvegarde les informations envoyer par le patient dans la base de donnees
        $patient = $request->except('_token');
        Patient::create($patient);
        return response()->json(['message' => 'la creation est reussit avec succes'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //cette fonction me permettra de recuperer un patient en particulier grace a sont identifiant
        $patient = Patient::find($id);
        if (is_null($patient)) {
            # code...
            return response()->json(['message' => 'patient introuvable', 404]);
        }

        return response()->json($patient, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, $id)
    {
        // fonction permettant la modification des informations d'un patient
        $patient = Patient::find($id);
        if (is_null($patient)) {
            # code...
            return response()->json(['message' => 'patient introuvable'], 404);
        }
        $patient->update($request->all());
        return response()->json(['message' => 'la modification est reussit avec succes'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //cette fonction permettra de supprime un patient dans la base de donnee
        $patient = Patient::find($id);
        if (is_null($patient)) {
            # code...
            return response()->json(['message' => 'patient introuvable', 404]);
        }
        $patient->delete();
        return response()->json(['message' => 'le patient a ete supprimer', 200]);
    }

}
