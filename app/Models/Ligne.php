<?php

namespace App\Models;

use App\Models\Vente;
use App\Models\Medicament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ligne extends Model
{
    use HasFactory;
    protected $fillable =['medicament_id','vente_id','quantite_vendue'];
    public function vente()
    {
        return $this->belongsTo(Vente::class, 'vente_id');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'medicament_id');
    }
}


