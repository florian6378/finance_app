@extends('layouts.app')

@section('content')
    <h1>Liste des transactions</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Montant</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->id) }}">Voir</a>
                        <a href="{{ route('transactions.edit', $transaction->id) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
