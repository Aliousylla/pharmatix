<?php

namespace App\Models;

use App\Models\Ligne;
use App\Models\Medicament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = ['total', 'date_vente'];
    
    // Exemple de relation avec le modèle Medicament
    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }
    public function lignes()
    {
        return $this->hasMany(Ligne::class);
    }

}
