<?php

namespace App\Models;

use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;
    protected $table = 'fournisseurs';
    protected $fillable = ['nom_societe', 'nom_contact', 'adresse', 'numero_telephone', 'adresse_email'];

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'fournisseur_id');
    }
}
