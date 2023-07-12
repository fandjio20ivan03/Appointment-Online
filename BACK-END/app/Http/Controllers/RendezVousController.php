<?php

namespace App\Http\Controllers;

use App\Models\Rendez_vous;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{

    public static  $ancienne_valeur = 90;

    /**
    * Display a listing of the resource.
     */

    public function index()
    {
        $rdv = Rendez_vous::all();
        return response()->json([
            'message'=>"La liste des rendez_vous",
            'data' => $rdv
        ]);
    }


    public function getTotalRendezVous(){
        $total  = Rendez_vous::all()->count();
        return response()->json($total,200);
    }



    // retourner l'augmentation des rendez-vous

    public function getAugmentationRendezVous(){

        $nouvelle_valeur = Rendez_vous::all()->count();

        // dd(RendezVousController::$ancienne_valeur);

        // $augmentation = ($nouvelle_valeur - RendezVousController::$ancienne_valeur)/ RendezVousController::$ancienne_valeur * 100;
        $augmentation = ((($nouvelle_valeur - RendezVousController::$ancienne_valeur)) / 100) * 100;


        // dd($augmentation,$nouvelle_valeur, RendezVousController::$ancienne_valeur);

        return response()->json($augmentation,200);
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
     */
    public function store(Request $request)
    {
        //
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
        if(empty($patient))
        {
            return response()->json(["massage" => "rendez-vous introuvable"],404);
        }

        $patient->delete();
        return response()->json(["massage" => "bonne suppression du rendez-vous"],200);


    }



}

