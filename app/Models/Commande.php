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
    protected $fillable = [ 'date_commande', 'statut_commande','total'];


    public function detailsCommande()
    {
        return $this->hasMany(DetailCommande::class, 'commande_id');
    }
}
