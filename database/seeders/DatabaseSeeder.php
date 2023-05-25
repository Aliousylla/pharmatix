<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Commande;
use App\Models\Medicament;
use App\Models\Emplacement;
use App\Models\Fournisseur;
use App\Models\LieuStockage;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorieSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorieSeeder::class);
        Medicament::factory()->count(100)->create();
        Fournisseur::factory()->count(10)->create();
        Commande::factory()->count(50)->create();
        LieuStockage::factory()->count(2)->create();
        Emplacement::factory()->count(5)->create();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
