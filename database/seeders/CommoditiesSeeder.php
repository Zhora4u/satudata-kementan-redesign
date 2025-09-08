<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commodity;

class CommoditiesSeeder extends Seeder
{
    public function run(): void
    {
        $items = ['Padi', 'Jagung', 'Kedelai', 'Ikan', 'Kakao', 'Kopi'];
        foreach ($items as $i) {
            Commodity::firstOrCreate(['name' => $i], [
                'slug' => \Illuminate\Support\Str::slug($i),
                'category' => 'crop',
                'description' => $i . ' commodity',
            ]);
        }
    }
}
