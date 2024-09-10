@extends('layouts.app')

@section('content')
    <h1>Connexion</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
        </div>
        
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
        </div>
        
        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore inscrit ? <a href="{{ route('register') }}">Créer un compte</a></p>
@endsection
