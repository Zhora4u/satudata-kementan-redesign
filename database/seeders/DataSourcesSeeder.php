<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataSource;

class DataSourcesSeeder extends Seeder
{
    public function run(): void
    {
        // create a few data sources referencing organizations & commodities
        DataSource::factory()->count(8)->create();
    }
}
