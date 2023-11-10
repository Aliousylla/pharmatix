<?php

namespace App\Models;

use App\Models\Ordonnance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medecin extends Model
{
    use HasFactory;
    public function ordonnance(){
        return  $this->hasMany(Ordonnance::class);
        }
}
