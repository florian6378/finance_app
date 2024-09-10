<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller

{

/**
     * @OA\Get(
     *     path="/api/transactions",
     *     tags={"Transactions"},
     *     summary="Liste des transactions",
     *     description="Retourne toutes les transactions de l'utilisateur authentifié.",
     *     operationId="getTransactions",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des transactions"
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
        // Récupère toutes les transactions et retourne en JSON
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

/**
     * @OA\Post(
     *     path="/api/transactions",
     *     tags={"Transactions"},
     *     summary="Créer une transaction",
     *     description="Crée une nouvelle transaction pour l'utilisateur authentifié.",
     *     operationId="storeTransaction",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"amount", "description"},
     *             @OA\Property(property="amount", type="number", example="100.00"),
     *             @OA\Property(property="description", type="string", example="Paiement facture")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Transaction créée avec succès"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non autorisé"
     *     ),
     *     security={{"sanctum": {}}}
     * )
     */


    public function store(Request $request)
    {
        // Validation et création d'une nouvelle transaction
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);


  /**
     * @OA\Get(
     *     path="/api/transactions/{id}",
     *     tags={"Transactions"},
     *     summary="Afficher une transaction",
     *     description="Affiche une transaction spécifique.",
     *     operationId="showTransaction",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la transaction",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détails de la transaction"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Transaction non trouvée"
     *     ),
     *     security={{"sanctum": {}}}
     * )
     */

        $transaction = Transaction::create($request->all());

        return response()->json([
            'message' => 'Transaction ajoutée avec succès',
            'transaction' => $transaction
        ]);
    }

    public function show($id)
    {
        // Récupère une transaction par son ID et retourne en JSON
        $transaction = Transaction::findOrFail($id);
        return response()->json($transaction);
    }

 /**
     * @OA\Put(
     *     path="/api/transactions/{id}",
     *     tags={"Transactions"},
     *     summary="Modifier une transaction",
     *     description="Met à jour une transaction existante.",
     *     operationId="updateTransaction",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la transaction",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"amount", "description"},
     *             @OA\Property(property="amount", type="number", example="200.00"),
     *             @OA\Property(property="description", type="string", example="Nouvelle description")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Transaction mise à jour avec succès"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Transaction non trouvée"
     *     ),
     *     security={{"sanctum": {}}}
     * )
     */



    public function update(Request $request, $id)
    {
        // Validation et mise à jour de la transaction
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);




        /**
     * @OA\Delete(
     *     path="/api/transactions/{id}",
     *     tags={"Transactions"},
     *     summary="Supprimer une transaction",
     *     description="Supprime une transaction spécifique.",
     *     operationId="deleteTransaction",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la transaction",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Transaction supprimée avec succès"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Transaction non trouvée"
     *     ),
     *     security={{"sanctum": {}}}
     * )
     */

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return response()->json([
            'message' => 'Transaction mise à jour avec succès',
            'transaction' => $transaction
        ]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json([
            'message' => 'Transaction supprimée avec succès'
        ]);
    }
}
