<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-2xl rounded-3xl p-10 max-w-2xl w-full text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-6 animate-fade-in">
            Bienvenue sur <span class="text-indigo-600">Smarttech</span>
        </h1>
        <p class="text-lg text-gray-600 mb-8">
            Cette plateforme est construite avec amour. Explorez et profitez !
        </p>

        <div class="flex justify-center space-x-6">
            <a href="{{ route('login') }}"
               class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-full shadow-lg hover:bg-indigo-700 transition duration-300">
                Se connecter
            </a>
            <a href="{{ route('register') }}"
               class="px-8 py-3 bg-white text-indigo-600 font-semibold border-2 border-indigo-600 rounded-full shadow-lg hover:bg-indigo-50 transition duration-300">
                S'inscrire
            </a>
        </div>

        <div class="mt-10">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} Laravel. Tous droits réservés.
            </p>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 1s ease-out forwards;
        }
    </style>

</body>
</html>
