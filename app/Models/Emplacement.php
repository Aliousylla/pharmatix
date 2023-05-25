<?php

namespace App\Models;

use App\Models\Medicament;
use App\Models\LieuStockage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Emplacement extends Model
{
    use HasFactory;
    protected $table = 'emplacements';
    protected $fillable = ['lieu_stockage_id', 'zone',  'tiroir','etage'];
 // $table->string('zone');
            // $table->string('etage');
            // $table->string('tiroir ');
            // $table->foreignId('lieu_stockage_id')->constrained();
    public function lieuStockage()
    {
        return $this->belongsTo(LieuStockage::class, 'lieu_stockage_id');
    }
    public function medicaments()
    {
        return $this->hasMany(Medicament::class, 'emplacement_id');
    }
}

