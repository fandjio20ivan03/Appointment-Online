<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(loginRequest $request)
    {
        // On valide les données du formulaire
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // On vérifie si les identifiants sont corrects
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $user = Auth()->user();
            $token = $user->createToken('Voici_ma_cle_secrete')->plainTextToken;
            // Si oui, on redirige vers la page d'accueil avec un message de succès
            return response()->json([
                "status_code"=> 200,
                "message"=> "l'utilisateur est connecte",
                "user"=> $user,
                "token" => $token
            ]);
            // return redirect()->route('home')->with('success', "Vous êtes connecté.");
        } else {
            // Si non, on redirige vers la page précédente avec un message d'erreur
            // return redirect()->back()->with('error', "Login ou mot de passe incorrect.");
            return response()->json([
                'status_code'=>401,
                "message"=>"information incorrect"
            ]);
        }
    }

    public function logout()
    {
        // On déconnecte l'utilisateur
        Auth::logout();

        // On redirige vers la page d'accueil avec un message de succès
        return redirect()->route('home')->with('success', "Vous êtes déconnecté.");
    }
}
