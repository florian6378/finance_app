<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

  /**
     * @OA\Get(
     *     path="/api/user",
     *     tags={"User"},
     *     summary="Afficher le profil utilisateur",
     *     description="Retourne les informations du profil utilisateur authentifié",
     *     operationId="getUserProfile",
     *     @OA\Response(
     *         response=200,
     *         description="Informations de l'utilisateur"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non autorisé"
     *     ),
     *     security={{"sanctum": {}}}
     * )
     */



    public function index()
    {
        // Récupère tous les utilisateurs et retourne en JSON
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        // Récupère un utilisateur par son ID et retourne en JSON
        $user = User::findOrFail($id);
        return response()->json($user);
    }


    /**
     * @OA\Put(
     *     path="/api/user",
     *     tags={"User"},
     *     summary="Mettre à jour le profil utilisateur",
     *     description="Met à jour les informations du profil utilisateur authentifié",
     *     operationId="updateUserProfile",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", example="john@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Profil mis à jour"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Données invalides"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non autorisé"
     *     ),
     *     security={{"sanctum": {}}}
     * )
     */

    public function update(Request $request, $id)
    {
        // Validation et mise à jour des informations de l'utilisateur
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        // Supprimer l'utilisateur
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'Utilisateur supprimé avec succès'
        ]);
    }
}
