<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index()
    {
        $medecins = Medecin::all();
        return response()->json([
            "status_code" => 200,
            "status_message"=>"Liste des medecins reccuperer",
            "data" => $medecins
        ]);
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Medecin $medecin)
    {
        //
    }

    public function edit(Medecin $medecin)
    {
        //
    }

    public function update(Request $request, Medecin $medecin)
    {
        //
    }

    public function destroy(Medecin $medecin)
    {
        //
    }
}
