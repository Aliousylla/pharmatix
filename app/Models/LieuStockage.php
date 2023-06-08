<?php

namespace App\Models;

use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LieuStockage extends Model
{
    use HasFactory;
    protected $table = 'lieu_stockages';
    protected $fillable = ['nom', 'adresse','categorie_id'];

    public function emplacements()
    {
        return $this->hasMany(Emplacement::class, 'emplacement_id');
    }
    public function medicament()
    {
        return $this->hasMany(Medicament::class, 'medicament_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    
    // public function LieuStockage()
    // {
    //     return $this->belongsTo(LieuStockage::class, 'lieu_stockage_id');
    // }
}
