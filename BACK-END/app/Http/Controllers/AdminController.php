<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins,200);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         //fonction me permettant de sauvegarde les informations de l'admin
         $request = $request->except($request->_token);
         Admin::create($request);
         return response()->json(['message' => 'la creation a reussit avec succes'], 200);
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
    public function show($id)
    {
        $admin = Admin::find($id);
        if(empty($admin))
        {
            return response()->json(["message" => "medecin introuvable"], 404);
        }
        return response()->json($admin,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        if(empty($admin))
        {
            return response()->json(["message" => "medecin introuvable"],404);
        }

        $admin->update($request->all());
        $admin->save();
        return response()->json(['message' => 'modification de l\'admin effectue avec succes'],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if(empty($admin))
        {
            return response()->json(["massage" => "admin introuvable"],404);
        }
        $admin->delete();
        return response()->json(["massage" => "bonne suppression de l'admin"],200);
    }
}
