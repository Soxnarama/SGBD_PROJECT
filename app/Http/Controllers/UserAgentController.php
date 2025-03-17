<?php

namespace App\Http\Controllers;

use App\Models\AgentDGE;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class UserAgentController extends Controller
{
    /**
     * Constructeur qui applique le middleware d'authentification
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Vérifie que l'utilisateur connecté est bien un agent DGE
     */
    private function checkAgentDGEAuth()
    {
        if (!Auth::check()) {
            abort(403, 'Accès non autorisé. Authentification requise.');
        }
        
        return true;
    }

    /**
     * Affiche la liste des agents DGE
     */
    public function index()
    {
        $this->checkAgentDGEAuth();
        
        // Récupérer tous les agents DGE avec pagination
        $agents = AgentDGE::with('user')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('agent_dge.users.index', compact('agents'));
    }

    /**
     * Affiche le formulaire d'ajout d'un nouvel agent DGE
     */
    public function create()
    {
        $this->checkAgentDGEAuth();
        
        return view('agent_dge.users.create');
    }

    /**
     * Enregistre un nouvel agent DGE
     */
    public function store(Request $request)
    {
        $this->checkAgentDGEAuth();
        
        // Validation des données
        $validator = Validator::make($request->all(), [
            // 'nom_utilisateur' => 'required|string|max:255|unique:users',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Créer l'agent DGE
            $agent = AgentDGE::create([
                'nom_utilisateur' => $request->input('email'),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'telephone' => $request->input('telephone'),
                'est_actif' => true,
                'date_creation' => now(),
                'mot_de_pass_hash' => Hash::make($request->input('password')),
            ]);

            // Créer l'utilisateur associé à l'agent
            $user = User::create([
                'nom_utilisateur' => $request->input('email'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'userable_id' => $agent->id,
                'userable_type' => AgentDGE::class,
                'date_creation' => now(),
            ]);

            return redirect()->route('agent_dge.users.index')
                ->with('success', 'Agent DGE créé avec succès.');

        } catch (\Exception $e) {
            Log::error('Erreur lors de la création d\'un agent DGE : ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de la création de l\'agent DGE : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Affiche les détails d'un agent DGE
     */
    public function show($id)
    {
        $this->checkAgentDGEAuth();
        
        $agent = AgentDGE::with('user')->findOrFail($id);
        
        return view('agent_dge.users.show', compact('agent'));
    }

    /**
     * Affiche le formulaire de modification d'un agent DGE
     */
    public function edit($id)
    {
        $this->checkAgentDGEAuth();
        
        $agent = AgentDGE::with('user')->findOrFail($id);
        
        return view('agent_dge.users.edit', compact('agent'));
    }

   
}