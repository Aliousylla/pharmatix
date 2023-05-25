<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Factories\Factory;


class CommandeFactory extends Factory
{
    protected $model = Commande::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();

        $fournisseur = Fournisseur::factory()->create();

        return [
            'fournisseur_id' => fournisseur::factory(),
            'date_commande' => $faker->dateTimeBetween('-1 year', 'now'),
            'statut' => $faker->randomElement(['en attente', 'expédiée', 'annulée']),
            // Autres attributs pertinents de la commande
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
