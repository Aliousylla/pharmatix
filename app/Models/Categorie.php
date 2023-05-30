<?php

namespace App\Models;

use App\Models\Medicament;
use App\Models\LieuStockage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['nom', 'description'];

    public function medicament()
    {
        return $this->hasMany(Medicament::class, 'categorie_id');
    }


    public function LieuStockage()
    {
        return $this->belongsTo(LieuStockage::class, 'lieu_stockage_id');
    }
}

