<?php

namespace Database\Factories;

use App\Models\Medicament;
use App\Models\Categorie;
use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class MedicamentFactory extends Factory
{
    protected $model = Medicament::class;

    public function definition()
    {
        $faker = FakerFactory::create();

        return [
            'nom' => $faker->sentence,
            'description' => $faker->paragraph,
            'dosage' => $faker->randomFloat(2, 1, 100),
            'fabricant' => $faker->company,
            'prix_unitaire' => $faker->randomFloat(2, 1, 100),
            'quantite_en_stock' => $faker->numberBetween(0, 100),
            'date_expiration' => $faker->date,
            'categorie_id' => Categorie::factory(),
            'emplacement_id' => Emplacement::factory(),
            'lieu_stockage_id' => Categorie::factory(),
        ];
    }

    public function configure()
    {
        return $this->state(function (array $attributes) {
            return [
                'id' => $this->faker->unique()->randomNumber(),
            ];
        });
    }
}