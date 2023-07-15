<?php

namespace App\Http\Controllers;

use App\Models\Validite;
use Illuminate\Http\Request;

class ValiditeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validites = Validite::all();
        return response()->json($validites,200);
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
        //fonction me permettant de sauvegarde les informations  dans la base de donnees
        $request = $request->except($request->_token);
        Validite::create($request);
        return response()->json(['message' => 'la creation a reussit avec succes'], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Validite $validite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Validite $validite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Validite $validite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Validite $validite)
    {
        //
    }
}
