<?php

namespace App\Models;

use App\Models\LigneProduit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    public function ligneProduit() {
        return $this->belongsTo(LigneProduit::class);
        }
}
