<?php

namespace App\Models;

use App\Models\LieuStockage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emplacement extends Model
{
    use HasFactory;
    protected $table = 'emplacements';
    protected $fillable = ['lieu_stockage_id', 'nom', 'description'];

    public function lieuStockage()
    {
        return $this->belongsTo(LieuStockage::class, 'lieu_stockage_id');
    }
}
