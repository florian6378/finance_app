@extends('layouts.app')

@section('content')
    <h1>Modifier la transaction</h1>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="amount">Montant :</label>
        <input type="number" name="amount" id="amount" value="{{ $transaction->amount }}" required step="0.01">
        
        <label for="description">Description :</label>
        <input type="text" name="description" id="description" value="{{ $transaction->description }}" required>
        
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
