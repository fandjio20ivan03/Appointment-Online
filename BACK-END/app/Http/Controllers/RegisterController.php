<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\User;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(registerRequest $request)
    {
        // dd('mon petit');
        // On valide les données du formulaire
        // $request->validate([
        //     'login' => 'required|unique:users',
        //     'password' => 'required|confirmed',
        //     'type' => 'required|in:0,1,2',
        //     'pat_nom' => 'required_if:type,0',
        //     'pat_prenom' => 'required_if:type,0',
        //     'pat_ville' => 'required_if:type,0',
        //     'pat_dateNais' => 'required_if:type,0|date',
        //     'pat_tel' => 'nullable',
        //     'med_nom' => 'required_if:type,1',
        //     'med_prenom' => 'required_if:type,1',
        //     'med_ville' => 'required_if:type,1',
        //     'med_dateNais' => 'required_if:type,1|date',
        //     'med_tel' => 'required_if:type,1',
        //     'specialite_id' => 'required_if:type,1|exists:specialites,id',
        //     'adm_nom' => 'required_if:type,2',
        //     'adm_prenom' => 'required_if:type,2',
        //     'adm_ville' => 'required_if:type,2',
        //     'adm_dateNais' => 'required_if:type,2|date',
        //     // adm_email est supprimé car il n'est pas dans la table admins
        //     // adm_email' => 'required_if:type,2|unique:users,email',
        //     'adm_tel' => 'required_if:type,2',
        // ]);

        // On crée un nouvel utilisateur avec les données du formulaire
        $user = new User();
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->save();
        // dd('mon petit');

        // On crée le profil associé à l'utilisateur selon son type
        switch ($user->type) {
            case 0: // patient
                $patient = new Patient();
                $patient->pat_nom = $request->pat_nom;
                $patient->pat_prenom = $request->pat_prenom;
                $patient->pat_ville = $request->pat_ville;
                $patient->pat_dateNais = $request->pat_dateNais;
                $patient->pat_tel = $request->pat_tel;
                $patient->user_id = $user->id;
                $patient->save();
                break;

            case 1: // medecin
                // On vérifie que l'utilisateur connecté est un administrateur
                if (auth()->user()->type != 2) {
                    return response()->json([
                        "status_code"=>201,
                        "message"=>"Vous n'avez pas le droit de créer un compte médecin."
                    ]);
                    // return redirect()->back()->with('error', "Vous n'avez pas le droit de créer un compte médecin.");
                }
                $medecin = new Medecin();
                $medecin->med_nom = $request->med_nom;
                $medecin->med_prenom = $request->med_prenom;
                $medecin->med_ville = $request->med_ville;
                $medecin->med_dateNais = $request->med_dateNais;
                $medecin->med_tel = $request->med_tel;
                $medecin->specialite_id = $request->specialite_id;
                $medecin->user_id = $user->id;
                $medecin->save();
                break;

            case 2: // admin
                // On vérifie que l'utilisateur connecté est un administrateur
                // if (auth()->user()->type != 2) {
                //     return redirect()->back()->with('error', "Vous n'avez pas le droit de créer un compte administrateur.");
                // }
                $admin = new Admin();
                $admin->adm_nom = $request->adm_nom;
                $admin->adm_prenom = $request->adm_prenom;
                $admin->adm_ville = $request->adm_ville;
                $admin->adm_dateNais = $request->adm_dateNais;
                // adm_email est supprimé car il n'est pas dans la table admins
                // adm_email = $request->adm_email;
                $admin->adm_tel = $request->adm_tel;
                $admin->user_id = $user->id;
                $admin->save();
                break;
        }

        // On redirige vers la page d'accueil avec un message de succès
        // return redirect()->route('home')->with('success', "Le compte a été créé avec succès.");
        return response()->json([
            "status_code"=>200,
            "message"=>"l'enregistrement c'est bien effectuer",
            "user"=>$user,
            "data"=>$admin
        ]);
    }
}
