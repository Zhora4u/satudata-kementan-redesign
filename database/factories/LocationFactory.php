<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->state(),
            'type' => 'province',
            'code' => $this->faker->unique()->numberBetween(1000, 9999),
            'parent_id' => null,
        ];
    }
}
