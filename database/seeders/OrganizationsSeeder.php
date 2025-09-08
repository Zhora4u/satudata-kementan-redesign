<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationsSeeder extends Seeder
{
    public function run(): void
    {
        Organization::factory()->count(5)->create();
    }
}
