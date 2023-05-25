<?php

namespace Database\Factories;

use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fournisseur>
 */
class FournisseurFactory extends Factory
{
    protected $model = Fournisseur::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'nom_societe' => $faker->company,
            'nom_contact' => $faker->name,
            'adresse' => $faker->address,
            'numero_telephone' => $faker->phoneNumber,
            'adresse_email' => $faker->email,
        ];
    }
}