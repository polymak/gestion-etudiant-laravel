<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use App\Models\Filiere;


use Illuminate\Http\Request;

class ControllerEtudiant extends Controller
{

    // ajouter les informations dans la base des données
    public function pageajout(){
        $filieres = Filiere::get();
        return view('ajouteretudiant', compact('filieres'));
    }

    public function ajouterEtudiant(Request $request){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'filiere_id'=>'required',
        ]);

        Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'filiere_id' => $request->filiere_id,
        ]);

        return redirect()->route('page.ajout.etudiant')->with('success', 'Enregistrement avec succès');

    }

        // Afficher la liste des informations de la base des données
        public function pagealist_etudiant(){
            //$filieres = Filiere::get();
            $etudiants = Etudiant::OrderBy('id', 'Desc')->paginate(3);
            return view('listeetudiant', compact('etudiants'));
        }


        // Supprimer les informations de la base des données
        public function supprimer_etudiant(Etudiant $etudiant){
            $findetudiant = Etudiant::find($etudiant);
            if($findetudiant){
            $etudiant->delete();
            return redirect()->route('page.liste.etudiant')->with('success', 'Supprimer avec succès');
            }
            return back()->with('errors', 'Etudiant introuvable');
        }

        // Modifier les informations de la base des données
        public function modifier_etudiant($etudiant){
            $filieres = Filiere::get();
            $etudiantmodif = Etudiant::find($etudiant);
            return view('modifieretudiant', compact('etudiantmodif','filieres'));
        }

        public function modifier_etudiant_action(Request $request, $etudiant){
            $etudiant = Etudiant::find($etudiant);
            $request->validate([
                'nom'=>'required',
                'prenom'=>'required',
                'filiere_id'=>'required',
            ]);

            if($etudiant){
                $etudiant->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'filiere_id' => $request->filiere_id,
                ]);

                return redirect()->route('page.liste.etudiant')->with('success', 'Modifier avec succès');
            }

        }
        
        
}
