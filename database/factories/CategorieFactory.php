<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class CategorieFactory extends Factory
{
    protected $model = Categorie::class;

    public function definition()
    {
        $faker = FakerFactory::create();

        return [
            'nom' => $faker->word,
            'description' => $faker->sentence,
        ];
    }
}
