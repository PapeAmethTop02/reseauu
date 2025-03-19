<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Titre de la page -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Tailwind CSS (si vous utilisez Tailwind) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div id="app">
        <!-- Barre de navigation -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 focus:text-gray-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" x="0" y="0" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <a href="{{ url('/') }}" class="text-2xl font-semibold text-indigo-600">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Liens à gauche -->
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-lg font-medium">Tableau de bord</a>
                            <a href="{{ route('files.index') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-lg font-medium">Fichiers</a>

                            <!-- Lien vers le tableau de bord administrateur (uniquement pour les admins) -->
                            @auth
                                @if (Auth::user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-lg font-medium">Tableau de bord Admin</a>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center">
                        <!-- Authentification -->
                        @guest
                            <!-- Liens pour les utilisateurs non connectés -->
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-lg font-medium">Connexion</a>
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-lg font-medium">Inscription</a>
                        @else
                            <!-- Liens pour les utilisateurs connectés -->
                            <div class="relative">
                                <button class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-lg font-medium">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </button>

                                <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-1 z-10">
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:text-indigo-600"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contenu principal -->
        <main class="py-8">
            @yield('content')
        </main>
    </div>

    <!-- Scripts JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
