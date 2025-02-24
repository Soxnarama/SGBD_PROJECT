<!-- resources/views/electeurs/index.blade.php -->

@extends('layouts.layout-electeur')

@section('title', 'Tableau de bord du Parrain')

@section('content')
<h2 class="text-2xl font-bold mb-4">Bienvenue dans votre espace Parrain</h2>
<p class="mb-6">Voici les informations relatives à votre rôle de parrain.</p>

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Complétez votre inscription</h2>
    <p class="text-gray-600 text-center mb-4">Veuillez fournir un numéro de téléphone et une adresse email valides.</p>

    <form method="POST" 
        action="{{ route('electeurs.comptes.completerCompte') }}" 
        class="space-y-4">
        @csrf

        <div>
            <label for="telephone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
            <input type="text" id="telephone" name="telephone" required 
                   class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @error('telephone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
            <input type="email" id="email" name="email" required 
                   class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 text-white py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition duration-300">
            Valider mon inscription
        </button>
    </form>
</div>




@endsection