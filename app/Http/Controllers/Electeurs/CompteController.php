<?php

namespace App\Http\Controllers\Electeurs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function index(){
        return view('electeurs.compte.index');
    }


    public function create(){

        // la logique pour creer ou activer le compte
        // return redirect('electeurs.completer');
        // ou
        return redirect()->route('electeurs.comptes.completer');

    }

    public function completer(){
        // la logique pour completer le compte
        return view("electeurs.compte.completer");
    }

    public function completerCompte(){
        return redirect()->route('welcome');
    }
}


