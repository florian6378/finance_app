@extends('layouts.app')

@section('content')
    <h1>Détails de la transaction</h1>
    <p>ID: {{ $transaction->id }}</p>
    <p>Montant: {{ $transaction->amount }}</p>
    <p>Description: {{ $transaction->description }}</p>
    <p>Date: {{ $transaction->created_at }}</p>

    <a href="{{ route('transactions.index') }}">Retour à la liste</a>
@endsection
