<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Http\Requests\Medecin\MedecinRequest;
use App\Models\Rendez_vous;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $request = $request->except($request->_token);
        Medecin::create($request);
        return response()->json(['message' => 'la creation a reussit avec succes'], 200);
    }

    public function show($id)
    {
        $medecin = Medecin::find($id);
        if ($medecin->isEmpty()) {
            return response()->json(["message" => "medecin introuvable"], 404);
        }
        return response()->json($medecin, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medecin $medecin)
    {
    }

    public function update(MedecinRequest $request, $id)
    {
        $medecin = Medecin::find($id);
        if ($medecin->isEmpty()) {
            return response()->json(["message" => "medecin introuvable"], 404);
        }

        $medecin->update($request->all());
        $medecin->save();
        return response()->json(['message' => 'modification du medecin effectue avec succes'], 200);
    }


    public function destroy($id)
    {
        $medecin = Medecin::find($id);
        if ($medecin->isEmpty()) {
            return response()->json(["massage" => "medecin introuvable"], 404);
        }
        $medecin->delete();
        return response()->json(["massage" => "bonne suppression du medecin"], 200);
    }



    public function getPageMedecin(Request $request)
    {
        // dd($request);
        $pagination = 9;
        $page = $request->input('page');
        $data = Medecin::paginate($pagination, ['*'], 'page', $page);
        return response()->json(['data' => $data->Items(), 'total' => $data->total()], 200);
    }

    public function getMedecinsBySearch(Request $request)
    {
        $search = $request->input('search');

        $medecins = Medecin::where('med_nom', 'LIKE', '%' . $search . '%')->orWhere('med_prenom', 'LIKE', '%' . $search . '%')->orWhere('med_ville', 'LIKE', '%' . $search . '%')->get();

        if ($medecins->isEmpty()) {

            return response()->json($medecins, 200);
        } else {

            return response()->json(['message' => 'introuve'], 201);
        }
    }



    public function getTotalMedecin()
    {
        $total = Medecin::all()->count();
        return response()->json($total, 200);
    }


    //retourner l'ensemble des rendez-vous d'un medecin specifique
    public function getRendezVousMedecin(Request $request, $medecin_id)
    {

        $pagination = 9;
        $page = $request->input('page');
        $rendez_vous = Rendez_vous::select('id', 'date', 'heure_debut', 'heure_fin', 'patient_id')->where('medecin_id', '=', $medecin_id)->with('patient')->paginate($pagination, ['*'], 'page', $page);
        if ($rendez_vous->isEmpty()) {
            return response()->json(['message' => 'introuve'], 201);
        } else {
            return response()->json($rendez_vous, 200);
        }
    }
}
