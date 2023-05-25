<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FournisseurController extends Controller
{
    //
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        return view('fournisseurs.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom_societe' => 'required',
            'nom_contact' => 'required',
            'adresse' => 'required',
            'numero_telephone' => 'required',
            'adresse_email' => 'required|email',
        ]);

        // Créer un nouveau fournisseur
        $fournisseur = Fournisseur::create($validatedData);

        // Rediriger vers la liste des fournisseurs avec un message de succès
        return redirect()->route('fournisseurs.index')->with('success', 'Le fournisseur a été créé avec succès.');
    }

    public function show($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs.show', compact('fournisseur'));
    }

    public function edit($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom_societe' => 'required',
            'nom_contact' => 'required',
            'adresse' => 'required',
            'numero_telephone' => 'required',
            'adresse_email' => 'required|email',
        ]);

        // Rechercher le fournisseur à mettre à jour
        $fournisseur = Fournisseur::findOrFail($id);

        // Mettre à jour les données du fournisseur
        $fournisseur->update($validatedData);

        // Rediriger vers la liste des fournisseurs avec un message de succès
        return redirect()->route('fournisseurs.index')->with('success', 'Le fournisseur a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher le fournisseur à supprimer
        $fournisseur = Fournisseur::findOrFail($id);

        // Supprimer le fournisseur
        $fournisseur->delete();

        // Rediriger vers la liste des fournisseurs avec un message de succès
        return redirect()->route('fournisseurs.index')->with('success', 'Le fournisseur a été supprimé avec succès.');
    }
}
