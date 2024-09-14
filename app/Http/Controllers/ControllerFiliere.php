<?php

namespace App\Http\Controllers;
use App\Models\Filiere;


use Illuminate\Http\Request;

class ControllerFiliere extends Controller
{
    public function pageFiliere(){
        return view('ajoutfiliere');
    }
    // ajouter les informations dans la base des données
    public function ajouterFiliere(Request $request){
        $request->validate([
            'libelle'=>'required',
            'description'=>'required',
        ]);

        Filiere::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        return redirect()->route('page.filiere')->with('success', 'Enregistrement avec succès');
    }

    
    // Afficher la liste des informations de la base des données
    public function liste_Filiere(){
        //$filieres = Filiere::get();
        $filieres = Filiere::OrderBy('id', 'Desc')->paginate(3);
        return view('listefiliere', compact('filieres'));
    }


}
