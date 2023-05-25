<?php

namespace App\Models;

use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LieuStockage extends Model
{
    use HasFactory;
    protected $table = 'lieu_stockages';
    protected $fillable = ['nom', 'adresse'];

    public function emplacements()
    {
        return $this->hasMany(Emplacement::class, 'lieu_stockage_id');
    }
}
