<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

// Page d'accueil (optionnel)
Route::get('/', function () {
    return view('welcome');
});

// Routes pour afficher les formulaires de connexion et d'inscription
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Exemple de route protégée pour vérifier si la connexion fonctionne
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Routes protégées par Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Route pour obtenir les informations de l'utilisateur connecté
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
   // Routes pour les utilisateurs
   Route::get('/users', [UserController::class, 'index']);
   Route::get('/users/{id}', [UserController::class, 'show']);
   Route::put('/users/{id}', [UserController::class, 'update']);
   Route::delete('/users/{id}', [UserController::class, 'destroy']);

   // Routes pour les transactions
   Route::get('/transactions', [TransactionController::class, 'index']);
   Route::post('/transactions', [TransactionController::class, 'store']);
   Route::get('/transactions/{id}', [TransactionController::class, 'show']);
   Route::put('/transactions/{id}', [TransactionController::class, 'update']);
   Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);
});

