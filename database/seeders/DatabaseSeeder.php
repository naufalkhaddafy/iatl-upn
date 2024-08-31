<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\NewsFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
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
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@iatl.com',
            'isPremium' => 1,
            'register_code' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        $user = User::create([
            'name' => 'Alumni IATL',
            'email' => 'alumni@iatl.com',
            'isPremium' => 0,
            'nim' => '12345',
            'register_code' => 'alumni',
            'password' => Hash::make('alumni'),
        ]);
        $admin->assignRole($roleAdmin);
        $user->assignRole($roleUser);

        $this->call(ProvinceSeeder::class);
        $this->call(RegencySeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(UserSeeder::class);
    }
}
