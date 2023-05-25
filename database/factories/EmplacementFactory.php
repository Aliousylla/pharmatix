<?php

namespace Database\Factories;

use App\Models\Emplacement;
use App\Models\LieuStockage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\emplacement>
 */
class EmplacementFactory  extends Factory
{
    protected $model = Emplacement::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
       
        return [
            //
        'zone' => $faker->word,
        'etage' => $faker->randomDigit(),
        'tiroir' => $faker->randomDigit(),
        'lieu_stockage_id' => LieuStockage::factory(),
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
