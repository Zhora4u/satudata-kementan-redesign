<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dashboard;
use App\Models\Organization;
use Illuminate\Support\Str;

class DashboardFactory extends Factory
{
    protected $model = Dashboard::class;

    public function definition()
    {
        $name = $this->faker->sentence(3);
        return [
            'name' => $name,
            'slug' => Str::slug($name . '-' . $this->faker->unique()->numberBetween(1, 999)),
            'organization_id' => Organization::factory(),
            'config' => ['widgets' => []],
            'is_public' => $this->faker->boolean(30),
        ];
    }
}
