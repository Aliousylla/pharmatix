<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailCommande;
use App\Http\Controllers\Controller;

class DetailsCommandeController extends Controller
{
    //
    public function index()
    {
        $detailsCommande = DetailCommande::all();
        return view('details_commande.index', compact('detailsCommande'));
    }

    public function create()
    {
        return view('details_commande.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'commande_id' => 'required',
            'medicament_id' => 'required',
            'quantite_commandee' => 'required',
            'prix_unitaire_commande' => 'required',
        ]);

        // Créer un nouveau détail de commande
        $detailCommande = DetailCommande::create($validatedData);

        // Rediriger vers la liste des détails de commande avec un message de succès
        return redirect()->route('details_commande.index')->with('success', 'Le détail de commande a été créé avec succès.');
    }

    public function show($id)
    {
        $detailCommande = DetailCommande::findOrFail($id);
        return view('details_commande.show', compact('detailCommande'));
    }

    public function edit($id)
    {
        $detailCommande = DetailCommande::findOrFail($id);
        return view('details_commande.edit', compact('detailCommande'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'commande_id' => 'required',
            'medicament_id' => 'required',
            'quantite_commandee' => 'required',
            'prix_unitaire_commande' => 'required',
        ]);

        // Rechercher le détail de commande à mettre à jour
        $detailCommande = DetailCommande::findOrFail($id);


        // Mettre à jour les données du détail de commande
        $detailCommande->update($validatedData);

        // Rediriger vers la liste des détails de commande avec un message de succès
        return redirect()->route('details_commande.index')->with('success', 'Le détail de commande a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher le détail de commande à supprimer
        $detailCommande = DetailCommande::findOrFail($id);

        // Supprimer le détail de commande
        $detailCommande->delete();

        // Rediriger vers la liste des détails de commande avec un message de succès
        return redirect()->route('details_commande.index')->with('success', 'Le détail de commande a été supprimé avec succès.');
    }
}
