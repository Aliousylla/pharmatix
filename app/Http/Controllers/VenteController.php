<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Vente;
use App\Models\Categorie;
use App\Models\Medicament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenteController extends Controller
{
    //
    public function index()
    {
        $ventes = Vente::all();
        $medicaments = Medicament::all();
        $categories = Categorie::all();
        
        return view('ventes.index', compact('ventes','medicaments','categories'));
    }

    public function ajouterAuPanier(Request $request)
{
   try {
    $medicament = Medicament::findOrFail($request->medicament_id);

    $item = [
        'medicament' => $medicament,
        'quantite_vendue' => $request->quantite,
        'prix_total' => $medicament->prix_unitaire * $request->quantite
    ];

    $panier = [];

    if ($request->session()->has('panier')) {
        $panier = $request->session()->get('panier');
    }

    $panier[] = $item;

    $request->session()->put('panier', $panier);

    return redirect()->back()->with('success', 'Le médicament a été ajouté au panier.');
   } catch (\Throwable $th) {
    return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'ajout du médicament au panier.');
   }
}

    
    public function afficherPanier()
    {
        try {
            $panier = session()->get('panier', []);
            $total = 0;
    
            foreach ($panier as $item) {
                $total += $item['prix_total'];
            }
    
            return view('ventes.create', compact('panier', 'total'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la génération du panier.');
        }
    }

    public function validerVente(Request $request)
    {
        $panier = $request->session()->get('panier');

        // Enregistrer la vente dans la base de données
        foreach ($panier as $item) {
            $vente = new Vente();
            $vente->medicament_id = $item['medicament']->id;
            $vente->quantite_vendue = $item['quantite'];
            $vente->prix_unitaire_vente = $item['medicament']->prix_unitaire;
            $vente->date_vente = date('Y-m-d');
            $vente->save();
        }

        // Réinitialiser le panier
        $request->session()->forget('panier');

        return redirect()->route('ventes.create')->with('success', 'La vente a été enregistrée.');
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
        $medicaments = $request->input('medicament');
        $quantites = $request->input('quantite_vendue');
        
        foreach ($medicaments as $index => $medicamentId) {
            $medicament = Medicament::find($medicamentId);
            
            if ($medicament) {
                $vente = new Vente();
                $vente->medicament_id = $medicamentId;
                $vente->quantite_vendue = $quantites[$index];
                $vente->prix_total = $quantites[$index] * $medicament->prix_unitaire;
                
                // Diminuer la quantité vendue dans la base de données
                $medicament->quantite_en_stock -= $quantites[$index];
                $medicament->save();
                
                // Enregistrez la vente dans la base de données
                $vente->save();
            }
        }
        
        return redirect()->route('vente.index')->with('success', 'La vente a été enregistrée avec succès.');
    }
        // // Valider les données du formulaire
        // $validatedData = $request->validate([
        //     'medicament_id' => 'required',
        //     'quantite_vendue' => 'required',
        //     'prix_unitaire_vente' => 'required',
        //     'date_vente' => 'required',
        // ]);

        // // Créer une nouvelle vente
        // $vente = Vente::create($validatedData);

        // // Rediriger vers la liste des ventes avec un message de succès
        // return redirect()->route('ventes.index')->with('success', 'La vente a été créée avec succès.');
        
    

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

    public function searchMedicamentAutocomplete(Request $request)
{
    $term = $request->input('term');
    $medicaments = Medicament::where('nom', 'LIKE', '%' . $term . '%')
                             ->select('nom', 'prix_unitaire','quantite_en_stock','date_expiration','id')
                             ->get();
    return response()->json($medicaments);
}
    
    

}
