<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DataSource;
use App\Models\Organization;
use App\Models\Commodity;

class DataSourceFactory extends Factory
{
    protected $model = DataSource::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        return [
            'title' => $title,
            'slug' => \Str::slug($title . '-' . $this->faker->unique()->numberBetween(1,999)),
            'description' => $this->faker->paragraph(),
            'source_type' => $this->faker->randomElement(['api','csv','manual','portal']),
            'organization_id' => Organization::factory(),
            'commodity_id' => Commodity::factory(),
            'url' => $this->faker->url(),
            'meta' => ['sample' => true],
        ];
    }
}
