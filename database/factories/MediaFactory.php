<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Media;

class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition(): array
    {
        return [
            'filename' => $this->faker->lexify('file_????.jpg'),
            'path' => 'uploads/' . $this->faker->lexify('file_????.jpg'),
            'mime' => 'image/jpeg',
            'size' => $this->faker->numberBetween(1000, 500000),
            'collection' => $this->faker->randomElement(['images', 'documents']),
            // model_type & model_id set in seeder when attaching
        ];
    }
}
