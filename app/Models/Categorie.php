<?php

namespace App\Models;

use App\Models\Medicament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['nom', 'description'];
    public function medicaments()
    {
        return $this->hasMany(Medicament::class, 'categorie_id');
    }
}
