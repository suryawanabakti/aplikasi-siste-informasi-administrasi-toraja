<?php

namespace Database\Seeders;

use App\Models\DataMasyarakat;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            // 'id' => Str::uuid(),
            'name' => 'Melda',
            'email' => 'melda@admin',
            'password' => bcrypt('qwerty123'),
            'last_seen' => Carbon::now(),
        ]);

        $user3 = \App\Models\User::create([
            // 'id' => Str::uuid(),
            'name' => 'Henrik Panggoa',
            'email' => 'henrik@kepaladesa',
            'password' => bcrypt('qwerty123'),
            'last_seen' => Carbon::now(),
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'masyarakat']);
        Role::create(['name' => 'kepala desa']);

        $user->assignRole('admin');

        $user3->assignRole('kepala desa');
    }
}
