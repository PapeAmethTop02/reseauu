<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Titre de la page -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS (si vous utilisez Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Logo ou nom de l'application -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <!-- Bouton pour le menu responsive -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenu de la barre de navigation -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Liens à gauche -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Tableau de bord</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('files.index') }}">Fichiers</a>
                        </li>

                        <!-- Lien vers le tableau de bord administrateur (uniquement pour les admins) -->
                        @auth
                            @if (Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Tableau de bord Admin</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Liens à droite (connexion/déconnexion) -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentification -->
                        @guest
                            <!-- Liens pour les utilisateurs non connectés -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                            </li>
                        @else
                            <!-- Liens pour les utilisateurs connectés -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contenu principal -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap JS (si vous utilisez Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>