<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dataset;
use App\Models\Organization;
use App\Models\Commodity;
use App\Models\Location;

class DatasetFactory extends Factory
{
    protected $model = Dataset::class;

    public function definition()
    {
        return [
            'organization_id' => Organization::factory(),
            'commodity_id' => Commodity::factory(),
            'location_id' => Location::factory(),
            'title' => $this->faker->sentence(),
            'summary' => $this->faker->paragraph(),
            'data_meta' => ['unit' => $this->faker->randomElement(['ton', 'kg', 'ha']), 'freq' => 'monthly'],
            'file_path' => null,
            'source' => $this->faker->company(),
            'observed_at' => $this->faker->date(),
            'tags' => $this->faker->words(3),
        ];
    }
}
