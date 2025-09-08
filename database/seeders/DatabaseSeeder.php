<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            OrganizationsSeeder::class,
            CommoditiesSeeder::class,
            DataSourcesSeeder::class,
            PublicationsSeeder::class,
            MediaSeeder::class,
        ]);

        // optional: assign roles to some users
        $admin = \App\Models\User::first();
        $roleAdmin = \App\Models\Role::where('name', 'admin')->first();
        if ($admin && $roleAdmin) {
            $admin->roles()->syncWithoutDetaching([$roleAdmin->id]);
        }
    }
}
