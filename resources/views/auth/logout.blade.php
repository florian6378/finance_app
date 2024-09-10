<!-- Remplacer ce lien -->
<!-- <a href="{{ route('logout') }}">Déconnexion</a> -->

<!-- Par ce formulaire -->
<form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Déconnexion</button>
</form>
