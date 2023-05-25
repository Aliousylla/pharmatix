<?php

namespace Database\Factories;

use App\Models\LieuStockage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LieuStockage>
 */
class LieuStockageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = LieuStockage::class;
    public function definition(): array
    {

        $faker = \Faker\Factory::create();
        return [
            //
            'nom' => $faker->name,
        'adresse' => $faker->address,
       
        ];
    }
}
