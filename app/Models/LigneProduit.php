<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Ordonnance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneProduit extends Model
{
    use HasFactory;
    public function ordonnance(){
        return  $this->hasMany(Ordonnance::class);
        }
        public function produit(){
            return  $this->hasMany(Produit::class);
            }
}
