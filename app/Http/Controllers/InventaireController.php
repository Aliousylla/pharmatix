<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Emplacement;
use App\Models\Fournisseur;
use App\Models\LieuStockage;
use App\Models\Medicament;
use App\Models\Vente;
use Illuminate\Http\Request;

class InventaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $medicaments= Medicament::all();
        $categories= Categorie::all();
        $ventes= Vente::all();
        $commandes= Commande::all();
        $emplacements = Emplacement::all();
        $lieuStockages= LieuStockage::all();
        $fournisseurs = Fournisseur::all();
        return view('inventaires.index',compact('ventes','medicaments','categories','emplacements','lieuStockages','fournisseurs','commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
