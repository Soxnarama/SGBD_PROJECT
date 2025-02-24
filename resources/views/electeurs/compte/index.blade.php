<!-- resources/views/electeurs/index.blade.php -->

@extends('layouts.layout-electeur')

@section('title', 'Tableau de bord du Parrain')

@section('content')
<h2 class="text-2xl font-bold mb-4">Bienvenue dans votre espace Parrain</h2>
<p class="mb-6">Voici les informations relatives à votre rôle de parrain.</p>

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Création de compte électeur</h2>

    <form method="POST" 
    action ="{{ route('electeurs.comptes.create')}}"
    {{-- action="{{ route('electeurs.register') }}"  --}}
    class="space-y-4">
        @csrf

        <div>
            <label for="numero_carte_electeur" class="block text-sm font-medium text-gray-700">Numéro de carte d’électeur</label>
            <input type="text" id="numero_carte_electeur" name="numero_carte_electeur" required 
                   class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label for="numero_carte_identite" class="block text-sm font-medium text-gray-700">Numéro de carte d’identité nationale</label>
            <input type="text" id="numero_carte_identite" name="numero_carte_identite" required 
                   class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label for="nom_famille" class="block text-sm font-medium text-gray-700">Nom de famille</label>
            <input type="text" id="nom_famille" name="nom_famille" required 
                   class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label for="bureau_vote" class="block text-sm font-medium text-gray-700">Numéro du bureau de vote</label>
            <input type="text" id="bureau_vote" name="bureau_vote" required 
                   class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 text-white py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition duration-300">
            Créer mon compte
        </button>
    </form>
</div>


@endsection
