<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Application Laravel')</title>
    <!-- Inclure des fichiers CSS ici -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Contenu principal -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Barre de navigation -->
    <nav>
        @if (Auth::check())
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
        @else
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription</a>
        @endif
    </nav>

    <!-- Inclure des fichiers JS ici -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
