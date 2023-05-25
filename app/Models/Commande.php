<?php

namespace App\Models;

use App\Models\Fournisseur;
use App\Models\DetailCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $fillable = ['fournisseur_id', 'date_commande', 'statut_commande'];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }

    public function detailsCommande()
    {
        return $this->hasMany(DetailCommande::class, 'commande_id');
    }
}
