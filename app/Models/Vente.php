<?php

namespace App\Models;

use App\Models\Medicament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;
    protected $table = 'ventes';
    protected $fillable = ['medicament_id', 'quantite_vendue', 'prix_unitaire_vente', 'date_vente'];

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'medicament_id');
    }
}
