<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // On valide les données du formulaire
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // On vérifie si les identifiants sont corrects
        if (Auth::attempt(['login' => $validated['login'], 'password' => $validated['password']])) {
            $user = Auth()->user();
            $token = $user->createToken('Voici_ma_cle_secrete')->plainTextToken;
            // On renvoie une réponse JSON avec le message de succès et les données de l'utilisateur
            return response()->json([
                "status_code"=> 200,
                "message"=> "l'utilisateur est connecte",
                "user"=> $user,
                "token" => $token
            ]);
        } else {
            // Si non, on renvoie une réponse JSON avec le message d'erreur
            return response()->json([
                'status_code'=>401,
                "message"=>"Login ou mot de passe incorrect"
            ]);
        }
    }

    public function logout(Request $request)
    {
        // On révoque le token d'authentification de l'API
        $token = $request->user()->currentAccessToken();
        $token->revoke();

        // On renvoie une réponse JSON avec le message de succès
        return response()->json([
            "status_code"=> 200,
            "message"=> "L'utilisateur est déconnecté"
    ]);
    }
}
