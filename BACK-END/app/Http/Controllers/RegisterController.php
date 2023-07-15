<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\registerRequest;
use App\Models\User;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    public function register(registerRequest $request)
    {
        try {
            DB::beginTransaction();

            // On crée un nouvel utilisateur avec les données du formulaire
            $user = new User();
            $user->login = $request->login;
            $user->password = Hash::make($request->password);
            $user->type = $request->type;
            $user->save();

            // On crée le profil associé à l'utilisateur selon son type
            switch ($user->type) {
                case 0: // patient
                    $patient = new Patient();
                    $patient->pat_nom = $request->pat_nom;
                    $patient->pat_prenom = $request->pat_prenom;
                    $patient->pat_ville = $request->pat_ville;
                    // $patient->pat_dateNais = $request->pat_dateNais;
                    $patient->pat_dateNais = date('Y-m-d', strtotime($request->pat_dateNais));
                    $patient->pat_tel = $request->pat_tel;
                    $patient->user_id = $user->id;
                    $patient->save();
                    break;

                case 1: // medecin
                    // On vérifie que l'utilisateur connecté est un administrateur
                    if (auth()->user()->type != 2) {
                        return response()->json([
                            "status_code" => 201,
                            "message" => "Vous n'avez pas le droit de créer un compte médecin."
                        ]);
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
                    if (auth()->user()->type != 2) {
                        return response()->json([
                            "status_code" => 201,
                            "message" => "Vous n'avez pas le droit de créer un compte administrateur."
                        ]);
                    }
                    $admin = new Admin();
                    $admin->adm_nom = $request->adm_nom;
                    $admin->adm_prenom = $request->adm_prenom;
                    $admin->adm_ville = $request->adm_ville;
                    $admin->adm_dateNais = $request->adm_dateNais;
                    $admin->adm_tel = $request->adm_tel;
                    $admin->user_id = $user->id;
                    $admin->save();
                    break;
            }

            DB::commit();

            return response()->json([
                "status_code" => 200,
                "message" => "L'enregistrement s'est bien effectué",
                "user" => $user,
                "profile" => $patient ?? $medecin ?? $admin
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                "status_code" => 500,
                "message" => "Une erreur s'est produite lors de l'enregistrement : " . $e->getMessage()
            ]);
        }
    }
}




// class RegisterController extends Controller
// {
//     public function register(registerRequest $request)
//     {

//         // On crée un nouvel utilisateur avec les données du formulaire
//         $user = new User();
//         $user->login = $request->login;
//         $user->password = Hash::make($request->password);
//         $user->type = $request->type;
//         $user->save();

//         // On crée le profil associé à l'utilisateur selon son type
//         switch ($user->type) {
//             case 0: // patient
//                 $patient = new Patient();
//                 $patient->pat_nom = $request->pat_nom;
//                 $patient->pat_prenom = $request->pat_prenom;
//                 $patient->pat_ville = $request->pat_ville;
//                 $patient->pat_dateNais = $request->pat_dateNais;
//                 $patient->pat_tel = $request->pat_tel;
//                 $patient->user_id = $user->id;
//                 $patient->save();
//                 break;

//             case 1: // medecin
//                 // On vérifie que l'utilisateur connecté est un administrateur
//                 if (auth()->user()->type != 2) {
//                     return response()->json([
//                         "status_code"=>201,
//                         "message"=>"Vous n'avez pas le droit de créer un compte médecin."
//                     ]);
//                 }
//                 $medecin = new Medecin();
//                 $medecin->med_nom = $request->med_nom;
//                 $medecin->med_prenom = $request->med_prenom;
//                 $medecin->med_ville = $request->med_ville;
//                 $medecin->med_dateNais = $request->med_dateNais;
//                 $medecin->med_tel = $request->med_tel;
//                 $medecin->specialite_id = $request->specialite_id;
//                 $medecin->user_id = $user->id;
//                 $medecin->save();
//                 break;

//             case 2: // admin
//                 // On vérifie que l'utilisateur connecté est un administrateur
//                 if (auth()->user()->type != 2) {
//                     return response()->json([
//                         "status_code"=>201,
//                         "message"=>"Vous n'avez pas le droit de créer un compte médecin."
//                     ]);
//                 }
//                 $admin = new Admin();
//                 $admin->adm_nom = $request->adm_nom;
//                 $admin->adm_prenom = $request->adm_prenom;
//                 $admin->adm_ville = $request->adm_ville;
//                 $admin->adm_dateNais = $request->adm_dateNais;
//                 $admin->adm_tel = $request->adm_tel;
//                 $admin->user_id = $user->id;
//                 $admin->save();
//                 break;
//         }

//         return response()->json([
//             "status_code"=>200,
//             "message"=>"l'enregistrement c'est bien effectuer",
//             "user"=>$user,
//             "data"=>$admin,
//             "profile"=>$patient ?? $medecin ?? $admin
//         ]);
//     }
// }
