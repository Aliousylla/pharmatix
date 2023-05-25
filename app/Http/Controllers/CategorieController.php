<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    //
    public function index()
    {
        $categories = Categorie::all();

        return view('categories.index', compact('categories'));
        
    }

    public function create()
    {
        
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        // Créer une nouvelle catégorie
        $categorie = Categorie::create($validatedData);

        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'La catégorie a été créée avec succès.');
    }

    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.show', compact('categorie'));
    }

    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        // Rechercher la catégorie à mettre à jour
        $categorie = Categorie::findOrFail($id);

        // Mettre à jour les données de la catégorie
        $categorie->update($validatedData);

        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'La catégorie a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher la catégorie à supprimer
        $categorie = Categorie::findOrFail($id);

        // Supprimer la catégorie
        $categorie->delete();

        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'La catégorie a été supprimée avec succès.');
    }
}
