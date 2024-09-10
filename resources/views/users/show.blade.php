@extends('layouts.app')

@section('content')
    <h1>Détails de l'utilisateur</h1>
    <p>ID: {{ $user->id }}</p>
    <p>Nom: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <a href="{{ route('users.index') }}">Retour à la liste</a>
@endsection
