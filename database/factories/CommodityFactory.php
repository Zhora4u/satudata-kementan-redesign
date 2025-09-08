<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commodity;

class CommodityFactory extends Factory
{
    protected $model = Commodity::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'category' => $this->faker->randomElement(['horticulture', 'foodcrop', 'livestock', 'fishery']),
            'scientific_name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
        ];
    }
}
