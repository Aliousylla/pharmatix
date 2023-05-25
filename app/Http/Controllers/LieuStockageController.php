<?php

namespace App\Http\Controllers;

use App\Models\LieuStockage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LieuStockageController extends Controller
{
    //
    public function index()
    {
        $lieuxStockage = LieuStockage::all();
        return view('lieux_stockage.index', compact('lieuxStockage'));
    }

    public function create()
    {
        return view('lieux_stockage.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'pays' => 'required',
        ]);

        // Créer un nouveau lieu de stockage
        $lieuStockage = LieuStockage::create($validatedData);

        // Rediriger vers la liste des lieux de stockage avec un message de succès
        return redirect()->route('lieux_stockage.index')->with('success', 'Le lieu de stockage a été créé avec succès.');
    }

    public function show($id)
    {
        $lieuStockage = LieuStockage::findOrFail($id);
        return view('lieux_stockage.show', compact('lieuStockage'));
    }

    public function edit($id)
    {
        $lieuStockage = LieuStockage::findOrFail($id);
        return view('lieux_stockage.edit', compact('lieuStockage'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'pays' => 'required',
        ]);

        // Rechercher le lieu de stockage à mettre à jour
        $lieuStockage = LieuStockage::findOrFail($id);

        // Mettre à jour les données du lieu de stockage
        $lieuStockage->update($validatedData);

        // Rediriger vers la liste des lieux de stockage avec un message de succès
        return redirect()->route('lieux_stockage.index')->with('success', 'Le lieu de stockage a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Rechercher le lieu de stockage à supprimer
        $lieuStockage = LieuStockage::findOrFail($id);

        // Supprimer le lieu de stockage
        $lieuStockage->delete();

        // Rediriger vers la liste des lieux de stockage avec un message de succès
        return redirect()->route('lieux_stockage.index')->with('success', 'Le lieu de stockage a été supprimé avec succès.');
    }
}
