<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fournisseur;
use App\Models\Medicament;

class CommendeController extends Controller
{
    //
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        $medicaments = Medicament::all(); 
        $commandes = Commande::all();
        return view('commandes.index', compact('commandes','fournisseurs','medicaments'));
    }

    public function create()
    {
        return view('commandes.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'fournisseur_id' => 'required',
            'date_commande' => 'required',
            'statut_commande' => 'required',
            // Autres attributs pertinents
        ]);

        // Créer une nouvelle commande
        $commande = Commande::create($validatedData);

        // Rediriger vers la liste des commandes avec un message de succès
        return redirect()->route('commandes.index')->with('success', 'La commande a été créée avec succès.');
    }

    public function show($id)
    {
        $commande = Commande::findOrFail($id);
        return view('commandes.show', compact('commande'));
    }

    public function edit($id)
    {
        $commande = Commande::findOrFail($id);
        return view('commandes.edit', compact('commande'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'fournisseur_id' => 'required',
            'date_commande' => 'required',
            'statut_commande' => 'required',
            // Autres attributs pertinents
        ]);

        // Rechercher la commande à mettre à jour
        $commande = Commande::findOrFail($id);

        // Mettre à jour les données de la commande
        $commande->update($validatedData);

        // Rediriger vers la liste des commandes avec un message de succès
        return redirect()->route('commandes.index')->with('success', 'La commande a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher la commande à supprimer
        $commande = Commande::findOrFail($id);

        // Supprimer la commande
        $commande->delete();

        // Rediriger vers la liste des commandes avec un message de succès
        return redirect()->route('commandes.index')->with('success', 'La commande a été supprimée avec succès.');
    }
}
