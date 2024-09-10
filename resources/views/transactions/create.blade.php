@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle transaction</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <label for="amount">Montant :</label>
        <input type="number" name="amount" id="amount" required step="0.01">
        
        <label for="description">Description :</label>
        <input type="text" name="description" id="description" required>
        
        <button type="submit">Créer</button>
    </form>
@endsection
