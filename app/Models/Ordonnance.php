<?php

namespace App\Models;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\LigneProduit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ordonnance extends Model
{
    use HasFactory;
   
    public function patient() {
        return $this->belongsTo(Patient::class);
        }
        public function medecin() {
            return $this->belongsTo(Medecin::class);
            }
            public function ligneProduit() {
                return $this->belongsTo(LigneProduit::class);
                }

}
