<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Satudata',
                'password' => bcrypt('password'),
            ]
        );

        $role = Role::where('name', 'admin')->first();
        if ($role && !$admin->roles()->where('role_id', $role->id)->exists()) {
            $admin->roles()->attach($role);
        }

        // sample users
        User::factory()->count(5)->create()->each(function ($user) {
            // attach random role
            $role = Role::inRandomOrder()->first();
            if ($role) {
                $user->roles()->attach($role->id);
            }
        });
    }
}
    