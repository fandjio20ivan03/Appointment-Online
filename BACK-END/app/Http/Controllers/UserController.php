<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use App\Models\Admin;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Specialite;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // donne moi alors le code correct de cette function.

    // public function register(registerRequest $request) {

    //     try{

    //         if($request->type == 0)  {
    //             // dd($user = User::where('login', 'olivier')->first()->id);

    //              User::create([
    //                 'login' => $request->login,
    //                 'type' => $request->type,
    //                 'password' => Hash::make( $request->password )
    //             ]);

    //             $user = User::where('login', $request->login)->first();

    //             $patient =  Patient::create([
    //                         'pat_nom' => $request->nom,
    //                         'pat_prenom' => $request->prenom,
    //                         'pat_ville'=>$request->ville,
    //                         'pat_dateNais' => $request->date_de_naissance,
    //                         'pat_tel'=>$request->tel,
    //                         'user_id' => $user->id
    //                     ]);

    //             return response()->json([
    //                 "status_code"=>200,
    //                 "message"=>"Enregistrement effectuer avec success",
    //                 "user"=> $user,
    //                 "patient" => $patient
    //             ]);

    //         } else if($request->type == 1) {

    //             $medecin =  Medecin::create([
    //                 'med_nom' => $request->nom,
    //                 'med_prenom' => $request->prenom,
    //                 'med_date_de_naissance' => $request->date_de_naissance,
    //                 'med_ville'=>$request->ville,
    //                 'med_num_tel'=>$request->tel,
    //                 'med_spec_nom' => $request->specialite
    //             ]);

    //             $user = User::create([
    //                         'login' => $request->login,
    //                         'type' => $request->type,
    //                         'password' => $request->password
    //             ]);

    //             return response()->json([
    //                 "status_code"=>200,
    //                 "message"=>"Enregistrement effectuer avec success",
    //                 "user"=> $user,
    //                 "Medecin" => $medecin
    //             ]);
    //         } elseif($request->type == 2) {

    //             $admin =  Admin::create([
    //                 'adm_nom' => $request->nom,
    //                 'adm_prenom' => $request->prenom,
    //                 'adm_date_de_naissance' => $request->date_de_naissance,
    //                 'adm_ville'=>$request->ville,
    //                 'adm_num_tel'=>$request->tel,
    //                 'adm_spec_nom' => $request->specialite
    //             ]);

    //             $user = User::create([
    //                 'login' => $request->login,
    //                 'type' => $request->type,
    //                 'password' => $request->password
    //             ]);

    //             return response()->json([
    //                 "status_code"=>200,
    //                 "message"=>"Enregistrement effectuer avec success",
    //                 "user"=> $user,
    //                 "admin" =>$admin
    //             ]);
    //         }


    //     } catch(Exception $e) {
    //         response()->json($e);
    //     }
    // }



        // pourquoi ce code ne marche pas ?
        // je souhaite creer a ce qu'un medecin soit associer aussi a une specialite
    public function register(registerRequest $request) {

        try{

            if($request->type == 0) {
                // Créer un utilisateur
                $user = User::create([
                    'login' => $request->login,
                    'type' => $request->type,
                    'password' => Hash::make($request->password)
                ]);

                // Créer un patient associé à l'utilisateur
                $patient = $user->patient()->create([
                    'pat_nom' => $request->nom,
                    'pat_prenom' => $request->prenom,
                    'pat_ville'=>$request->ville,
                    'pat_dateNais' => $request->date_de_naissance,
                    'pat_tel'=>$request->tel
                ]);

                return response()->json([
                    "status_code"=>200,
                    "message"=>"Enregistrement effectué avec succès",
                    "user"=> $user,
                    "patient" => $patient
                ]);

            } else if($request->type == 1) {

                // $validate =  $request2->validate([
                //                 'specialite'=>'required|in:generaliste, Dentiste, pediatre,psychologue'
                //             ]);

                // if($validate) {
                //     response()->json([
                //         'error'=>"veillez choisir une specialite valide"
                //     ]);
                // }

                // Créer un utilisateur
                $user = User::create([
                    'login' => $request->login,
                    'type' => $request->type,
                    'password' => Hash::make($request->password)
                ]);

                $specialite = Specialite::create([
                    'specialite' => $request->spec_nom
                ]);
                dd(Specialite::where('spec_nom', $request->specialite)->first()->id);

                // $specialite_id = Specialite::where('spec_nom', $request->specialite)->first()->id;

                // Créer un médecin associé à l'utilisateur
                $medecin = $user->medecin()->create([
                    'med_nom' => $request->nom,
                    'med_prenom' => $request->prenom,
                    'med_dateNais' => $request->date_de_naissance,
                    'med_ville'=>$request->ville,
                    'med_tel'=>$request->num_tel,
                    // 'specialite_id' => $request->specialite,
                    'specialite_id' => Specialite::where('spec_nom', $request->specialite)->first()->id,
                    dd('specialite_id')
                ]);


                //Creer un medecin associer a la specialite
                // $medecin = $specialite->medecin()->create([
                //     'specialite_id' =>Specialite::where('spec_nom', $request->spec_nom)->first()->id
                // ]);

                return response()->json([
                    "status_code"=>200,
                    "message"=>"Enregistrement effectué avec succès",
                    "user"=> $user,
                    "Medecin" => $medecin
                ]);
            } elseif($request->type == 2) {

                // Créer un utilisateur
                $user = User::create([
                    'login' => $request->login,
                    'type' => $request->type,
                    'password' => Hash::make($request->password)
                ]);

                // Créer un administrateur associé à l'utilisateur
                $admin = $user->admin()->create([
                    'adm_nom' => $request->nom,
                    'adm_prenom' => $request->prenom,
                    'adm_date_de_naissance' => $request->date_de_naissance,
                    'adm_ville'=>$request->ville,
                    'adm_num_tel'=>$request->tel,
                    'adm_spec_nom' => $request->specialite
                ]);

                return response()->json([
                    "status_code"=>200,
                    "message"=>"Enregistrement effectué avec succès",
                    "user"=> $user,
                    "admin" =>$admin
                ]);
            }


        } catch(Exception $e) {
            response()->json($e);
        }
    }



    public function login(loginRequest $request) {
        // dd('ok connecter');

        if(auth()->attempt($request->only(['login', 'password']))) {

            $user = auth()->user();
            $token = $user->createToken('Voici_une_cle_secrette_generer')->plainTextToken;

            return response()->json([
                "status_code"=>200,
                "message"=>"utilisateur connecte",
                "user"=> $user,
                "token"=>$token
            ]);

        } else{
            return response()->json([
                "status_code"=>403,
                "message" => "information non valide"
            ]);
        }

    }
}
