<?php

namespace App\Models;

use App\Models\Vente;
use App\Models\Categorie;
use App\Models\Emplacement;
use App\Models\DetailCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicament extends Model
{
    use HasFactory;
    protected $table = 'medicaments';
    protected $fillable = ['nom', 'description', 'dosage', 'fabricant', 'prix_unitaire', 'quantite_en_stock', 'date_expiration', 'categorie_id', 'emplacement_id','lieu_stockage_id','fournisseur_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }
    public function LieuStockage()
    {
        return $this->belongsTo(LieuStockage::class, 'lieu_stockage_id');
    }

    public function emplacement()
    {
        return $this->belongsTo(Emplacement::class, 'emplacement_id');
    }
    public function detailsCommande()
    {
        return $this->hasMany(DetailCommande::class, 'medicament_id');
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class, 'medicament_id');
    }
}
