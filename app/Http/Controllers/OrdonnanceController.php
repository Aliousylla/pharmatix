<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Produit;
use App\Models\Ordonnance;
use App\Models\LigneProduit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $patients = Patient::all();
        $ordonnances = Ordonnance::all();
        $produits = Produit::all();
        $medecins = Medecin::all();
        $ligneProduits = LigneProduit::all();


        return view('ordonnances.index', compact('patients','ordonnances','produits','medecins','ligneProduits'));
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
        $ordonnances = Ordonnance::findOrFail($id);
        $ligneProduits = LigneProduit::where('ordonnance_id',$id)->get();
        
        return view('ordonnances.show', compact('ordonnances','ligneProduits'));
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
