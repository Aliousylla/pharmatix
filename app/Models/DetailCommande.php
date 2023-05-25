<?php

namespace App\Models;

use App\Models\Commande;
use App\Models\Medicament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailCommande extends Model
{
    use HasFactory;
    protected $table = 'details_commande';
    protected $fillable = ['commande_id', 'medicament_id', 'quantite_commandee', 'prix_unitaire_commande'];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'medicament_id');
    }
}
