<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the default admin account.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'DiskominfoKeren'],
            [
                'name' => 'Administrator Diskominfo',
                'username' => 'DiskominfoKeren',
                'email' => 'admin@karanganyarkab.go.id',
                'password' => Hash::make('DiskominfoKaranganyarKeren'),
                'is_admin' => true,
                'is_approved' => true,
            ]
        );
    }
}
