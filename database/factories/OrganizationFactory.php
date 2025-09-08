<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Organization;

class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    public function definition(): array
    {
        $name = $this->faker->company();
        return [
            'name' => $name,
            'slug' => \Str::slug($name . '-' . $this->faker->unique()->numberBetween(1, 999)),
            'contact_email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'description' => $this->faker->sentence(),
        ];
    }
}
