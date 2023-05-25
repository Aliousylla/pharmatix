<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Medicament;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MedicamentController extends Controller
{
     public function index()
    {
        $medicaments = Medicament::all();
        $categories = Categorie::all();
        return view('medicaments.index', compact('medicaments','categories'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('medicaments.create', compact('categories'));

    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'dosage' => 'required',
            'fabricant' => 'required',
            'prix_unitaire' => 'required',
            'quantite_en_stock' => 'required',
            'date_expiration' => 'required',
            'categorie_id' => 'required',
        ]);

        // Créer un nouveau médicament
        $medicament = Medicament::create($validatedData);

        // Rediriger vers la liste des médicaments avec un message de succès
        return redirect()->route('medicaments.index')->with('success', 'Le médicament a été créé avec succès.');
    }

    public function show($id)
    {
        $medicament = Medicament::findOrFail($id);
        $categories = Categorie::all();
        return view('medicaments.show', compact('medicament','categories'));
    }

    public function edit($id)
    {
        $medicament = Medicament::findOrFail($id);
        $categories = Categorie::all();
        return view('medicaments.edit', compact('medicament','categories'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'dosage' => 'required',
            'fabricant' => 'required',
            'prix_unitaire' => 'required',
            'quantite_en_stock' => 'required',
            'date_expiration' => 'required',
            'categorie_id' => 'required',
        ]);

        // Rechercher le médicament à mettre à jour
        $medicament = Medicament::findOrFail($id);

        // Mettre à jour les données du médicament
        $medicament->update($validatedData);

        // Rediriger vers la liste des médicaments avec un message de succès
        return redirect()->route('medicaments.index')->with('success', 'Le médicament a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher le médicament à supprimer
        $medicament = Medicament::findOrFail($id);

        // Supprimer le médicament
        $medicament->delete();

        // Rediriger vers la liste des médicaments avec un message de succès
        return redirect()->route('medicaments.index')->with('success', 'Le médicament a été supprimé avec succès.');
    }
}
