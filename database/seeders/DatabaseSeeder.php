<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\NewsFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $admin= \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@iatl.com',
            'isPremium' =>1,
            'password' => Hash::make('admin'),
        ]);
         $admin->assignRole($roleAdmin);

        $this->call(NewsSeeder::class);
        $this->call(UserSeeder::class);
    }
}
