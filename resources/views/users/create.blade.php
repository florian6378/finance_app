@extends('layouts.app')

@section('content')
    <h1>Créer un nouvel utilisateur</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" required>
        
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Créer</button>
    </form>
@endsection
