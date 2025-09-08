<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Publication;
use App\Models\User;

class PublicationFactory extends Factory
{
    protected $model = Publication::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'author_id' => User::factory(),
            'title' => $title,
            'slug' => \Str::slug($title . '-' . $this->faker->unique()->numberBetween(1, 999)),
            'summary' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(4, true),
            'is_published' => $this->faker->boolean(70),
            'published_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
