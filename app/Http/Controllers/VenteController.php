<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenteController extends Controller
{
    //
    public function index()
    {
        $ventes = Vente::all();
        return view('ventes.index', compact('ventes'));
    }

    public function create()
    {
        return view('ventes.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'medicament_id' => 'required',
            'quantite_vendue' => 'required',
            'prix_unitaire_vente' => 'required',
            'date_vente' => 'required',
        ]);

        // Créer une nouvelle vente
        $vente = Vente::create($validatedData);

        // Rediriger vers la liste des ventes avec un message de succès
        return redirect()->route('ventes.index')->with('success', 'La vente a été créée avec succès.');
    }

    public function show($id)
    {
        $vente = Vente::findOrFail($id);
        return view('ventes.show', compact('vente'));
    }

    public function edit($id)
    {
        $vente = Vente::findOrFail($id);
        return view('ventes.edit', compact('vente'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'medicament_id' => 'required',
            'quantite_vendue' => 'required',
            'prix_unitaire_vente' => 'required',
            'date_vente' => 'required',
        ]);

        // Rechercher la vente à mettre à jour
        $vente = Vente::findOrFail($id);

        // Mettre à jour les données de la vente
        $vente->update($validatedData);

        // Rediriger vers la liste des ventes avec un message de succès
        return redirect()->route('ventes.index')->with('success', 'La vente a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher la vente à supprimer
        $vente = Vente::findOrFail($id);

        // Supprimer la vente
        $vente->delete();

        // Rediriger vers la liste des ventes avec un message de succès
        return redirect()->route('ventes.index')->with('success', 'La vente a été supprimée avec succès.');
    }
}
