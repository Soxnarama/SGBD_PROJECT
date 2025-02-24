<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Parrainage - Espace Parrain')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-semibold">Bienvenue,
                 {{-- {{ auth()->user()->name }} (Parrain) --}}
            </h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('electeurs.dashboard') }}" class="hover:underline">Tableau de bord</a></li>
                    <li><a href="{{ route('electeurs.comptes.index') }}" class="hover:underline">Comptes</a></li>
                    <li><a href="{{ route('logout') }}" class="bg-red-500 px-3 py-2 rounded-md text-white hover:bg-red-700">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-6">
        <p>&copy; 2025 Parrainage. Tous droits réservés.</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
