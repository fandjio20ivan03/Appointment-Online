<?php

namespace App\Http\Controllers;

use App\Models\Exception;
use Illuminate\Http\Request;
use App\Http\Requests\Calendrier\CalendrierRequest;

class ExceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exception = Exception::all();
        return response()->json($exception,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CalendrierRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation des donnees de la requete
       $request = $request->except($request->_token);
       Exception::create($request);
       return response()->json(["message" => "date ajoutés avec succes"],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Exception $exception)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exception $exception)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exception $exception)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exception $exception)
    {
        //
    }
}
