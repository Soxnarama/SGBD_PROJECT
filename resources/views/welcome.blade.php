@extends('layouts.index')

@section('title', 'Accueil - SunuParrainage')

@section('content')

    <!-- Section Héro -->
    <section class="bg-blue-700 text-white text-center py-20">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold">Bienvenue sur SunuParrainage</h1>
            <p class="mt-4 text-lg">La plateforme de gestion des parrainages pour les élections présidentielles.</p>
            <a href="{{ url('/DashbordElecteur') }}"
                class="mt-6 inline-block bg-white text-blue-700 font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-200">
                Commencer le parrainage
            </a>
        </div>
    </section>

    <!-- Présentation -->
    <section class="py-16 px-6 bg-gray-100">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Comment ça fonctionne ?</h2>
            <p class="mt-4 text-gray-600">SunuParrainage facilite la collecte et la gestion des parrainages pour assurer des
                élections transparentes.</p>
        </div>

        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="text-2xl font-semibold text-blue-700">Candidats</h3>
                <p class="mt-2 text-gray-600">Déposez votre candidature et suivez l’évolution de vos parrainages.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="text-2xl font-semibold text-blue-700">Électeurs</h3>
                <p class="mt-2 text-gray-600">Soutenez un candidat en lui accordant votre parrainage en toute simplicité.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="text-2xl font-semibold text-blue-700">Administrateurs</h3>
                <p class="mt-2 text-gray-600">Supervisez le processus et garantissez la transparence des parrainages.</p>
            </div>
        </div>
    </section>

    <!-- Appel à l'Action -->
    <section class="py-20 bg-blue-600 text-white text-center">
        <h2 class="text-3xl font-bold">Rejoignez SunuParrainage dès aujourd’hui</h2>
        <p class="mt-4 text-lg">Inscrivez-vous et participez activement au processus électoral.</p>
        <a href="{{ url('/DashbordCandidat') }}"
            class="mt-6 inline-block bg-white text-blue-700 font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-200">
            Devenir Candidat
        </a>
    </section>

@endsection
