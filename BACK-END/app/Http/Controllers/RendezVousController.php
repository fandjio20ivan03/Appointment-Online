<?php

namespace App\Http\Controllers;

use App\Models\Rendez_vous;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {

        return response()->json(Rendez_vous::all(),200);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Rendez_vous $rendez_vous)
    {
        //
        $rendez_vous = rendez_vous::find($rendez_vous);
        if(is_null($rendez_vous)){
            return response()->json(['message'=> 'rendez_vous introuvable'],404);
        }
        return response()->json(rendez_vous::find($rendez_vous),200);
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
    public function destroy(Rendez_vous $rendez_vous)
    {
        //
    }

}
