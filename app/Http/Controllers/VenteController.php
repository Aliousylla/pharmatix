<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Vente;
use App\Models\Categorie;
use App\Models\Medicament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ligne;
use Psy\Readline\Hoa\Console;

class VenteController extends Controller
{
    //
    public function index()
    {
        $ventes = Vente::all();
        $lignes= Ligne::all();
        

        $categories = Categorie::all();
        
        return view('ventes.index',compact('ventes','lignes','categories'));
    }

    public function create()
    {
        $ventes =Vente::all();
        $medicaments = Medicament::all();
        $categories = Categorie::all();
     
        return  view('ventes.create', compact('ventes','medicaments','categories'));
    }
    
    public function store(Request $request)
{
    // Validation des champs
    $validatedData = $request->validate([
        'medicament_id.*' => 'required',
        'quantite_vendue.*' => 'required|numeric',
    ]);

    try {
        $vente = Vente::create([
            'total' => 0,
        ]);
        // Parcourir toutes les lignes
        for ($i = 0; $i < count($request->nom); $i++) {
            $ligne = Ligne::create([
                'vente_id' => $vente->id,
                'medicament_id' => $request->medicament_id[$i],
                'quantite_vendue' => $request->quantite_vendue[$i],
             
            ]);

            // Mettez à jour le total de la vente
            $vente->total += $ligne->quantite_vendue * $ligne->medicament->prix_unitaire;
        }

        
        $vente->save();
    
        
        return redirect()->route('ventes.create')->with(['success' => 'Vente enregistrée avec succès']);
        

    } catch (\Throwable $th) {
        // En cas d'erreur, redirigez avec un message d'erreur
        return view('ventes.create',with('error', 'Une erreur est survenue lors de l\'enregistrement de la vente.'));
    }
}
  

    public function show($id)
    {
        $ventes = Vente::findOrFail($id);
        $lignes = Ligne::where('vente_id',$id)->get();
        
        return view('ventes.show', compact('ventes','lignes'));
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

    public function searchMedicamentAutocomplete(Request $request)
{
    $term = $request->input('term');
    $medicaments = Medicament::where('nom', 'LIKE', '%' . $term . '%')
                             ->select('nom', 'prix_unitaire','quantite_en_stock','date_expiration','id')
                             ->get();
    return response()->json($medicaments);
}
}
