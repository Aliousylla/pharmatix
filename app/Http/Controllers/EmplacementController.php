<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Emplacement;
use Illuminate\Http\Request;

use App\Models\LieuStockage;

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
            'zone' => 'required',
            'etage' => 'required',
            'tiroir' => 'required',
            'lieu_stockage_id' => 'required',

            // $table->string('zone');
            // $table->string('etage');
            // $table->string('tiroir ');
            // $table->foreignId('lieu_stockage_id')->constrained();
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
        $emplacement = Emplacement::findOrFail($id);
        $emplacement->delete();   
        return redirect()->route('emplacements.index')->with('success', 'L\'emplacement a été supprimé avec succès.');
    }

    
    public function getEmplacements($lieuStockageId)
    {
        $emplacements = Emplacement::where('lieu_stockage_id', $lieuStockageId)->get();
        
        return response()->json($emplacements);
        
    }
    

    // public function getByCategorie($categorieId)
    // {
        
    // }
// public function getEmplacementsByLieuStockage($id)
// {
//     $lieuStockage = LieuStockage::findOrFail($id);
//     $emplacements = $lieuStockage->emplacements;

//     return response()->json($emplacements);
// }


}
