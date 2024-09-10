@extends('layouts.app')

@section('content')
    <h1>Inscription</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>
        </div>
        
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
        </div>
        
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
        </div>
        
        <div>
            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        
        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
@endsection
