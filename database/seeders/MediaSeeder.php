<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Publication;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        // Attach random media to random publications
        $publications = Publication::all();
        if ($publications->isEmpty()) {
            Publication::factory()->count(3)->create();
            $publications = Publication::all();
        }

        foreach ($publications as $pub) {
            $media = Media::factory()->create();
            $pub->media()->save($media);
        }
    }
}
