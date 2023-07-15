<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Rendez_vous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RendezVousController extends Controller
{

    public static  $ancienne_valeur = 90;

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $rdv = Rendez_vous::with('patient', 'medecin')->get();
        return response()->json([
            'message' => "La liste des rendez_vous",
            'data' => $rdv
        ]);
    }


    public function getTotalRendezVous()
    {
        $total  = Rendez_vous::all()->count();
        return response()->json($total, 200);
    }



    // retourner l'augmentation des rendez-vous /100

    public function getAugmentationRendezVous()
    {

        $nouvelle_valeur = Rendez_vous::all()->count();

        $augmentation = ((($nouvelle_valeur - RendezVousController::$ancienne_valeur)) / 100) * 100;

        return response()->json($augmentation, 200);
    }







    // //2 facon de faire
    // public function index2(Rendez_vous $rdv) {

    //     return response()->json([
    //         'message'=>"La liste des rendez_vous",
    //         'data' => $rdv
    //     ]);
    // }
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *  load balancing
     */
    public function store(Request $request, $patient_id)
    {
        $patients = Rendez_vous::get('patient_id');

        // verifier si le patient n'a pas encore pris un rendez-vous

        if(!$patients->contains('patient_id', $patient_id)){

            $heure_debut = $request->input('heure_debut');
            $heure_fin = $request->input('heure_fin');
            $date = $request->input('date');

            // Recherche des médecins disponibles à l'heure et à la date spécifiées dans la table calendrier
            $medecinsDisponibles = Medecin::whereHas('calendriers', function ($query) use ($heure_debut, $heure_fin, $date) {
                $query->where('heure_debut', $heure_debut)
                    ->where('heure_fin', $heure_fin)
                    ->where('date', $date);
            })->get();

            $medecins = [];

            foreach ($medecinsDisponibles as $med) {
                $medecin =  $med;
                $rdv_count = $med->rendez_vous->count();

                $medecins[] = [
                    'medecin' => $medecin,
                    'rendez_vous_count' => $rdv_count,
                ];
            }

            // trier l'emsemble des ces medecins
            usort($medecins, function ($a, $b) {
                return $a['rendez_vous_count'] - $b['rendez_vous_count'];
            });

            //medecin choisi
            // ici, le medecin choisi sera le premier
            $medecin_choisi = $medecins[0]['medecin'];



            $res = Rendez_vous::create([
                'date' => $date,
                'heure_debut' => $heure_debut,
                'heure_fin' => $heure_fin,
                'role' => 'en attente',
                'medecin_id' => $medecin_choisi->id,
                'patient_id' => $patient_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json($res, 200);
        } else {

            return response()->json(['message' => 'vous devez d\'abord honorer le rendez-vous que vous avez déjà pris'], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rendez_vous $rendez_vous)
    {
        //
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
    public function update(Request $request, Rendez_vous $rendez_vous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->ancienne_valeur = Rendez_vous::all()->count();

        $patient = Rendez_vous::find($id);
        if (empty($patient)) {
            return response()->json(["massage" => "rendez-vous introuvable"], 404);
        }

        $patient->delete();
        return response()->json(["massage" => "bonne suppression du rendez-vous"], 200);
    }
}
