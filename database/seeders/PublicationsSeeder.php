<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;
use App\Models\User;

class PublicationsSeeder extends Seeder
{
    public function run(): void
    {
        // ensure there are some users (uses your existing UserFactory)
        User::factory()->count(6)->create();

        Publication::factory()->count(10)->create();
    }
}
