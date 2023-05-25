<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmplacementController extends Controller
{
    //
    public function index()
    {
        $emplacements = Emplacement::all();
        return view('emplacements.index', compact('emplacements'));
    }

    public function create()
    {
        return view('emplacements.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'lieu_stockage_id' => 'required',
        ]);

        // Créer un nouvel emplacement
        $emplacement = Emplacement::create($validatedData);

        // Rediriger vers la liste des emplacements avec un message de succès
        return redirect()->route('emplacements.index')->with('success', 'L\'emplacement a été créé avec succès.');
    }

    public function show($id)
    {
        $emplacement = Emplacement::findOrFail($id);
        return view('emplacements.show', compact('emplacement'));
    }

    public function edit($id)
    {
        $emplacement = Emplacement::findOrFail($id);
        return view('emplacements.edit', compact('emplacement'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'lieu_stockage_id' => 'required',
        ]);

        // Rechercher l'emplacement à mettre à jour
        $emplacement = Emplacement::findOrFail($id);

        // Mettre à jour les données de l'emplacement
        $emplacement->update($validatedData);

        // Rediriger vers la liste des emplacements avec un message de succès
        return redirect()->route('emplacements.index')->with('success', 'L\'emplacement a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher l'emplacement à supprimer
        $emplacement = Emplacement::findOrFail($id);

        // Supprimer l'emplacement
        $emplacement->delete();

        // Rediriger vers la liste des emplacements avec un message de succès
        return redirect()->route('emplacements.index')->with('success', 'L\'emplacement a été supprimé avec succès.');
    }
}
