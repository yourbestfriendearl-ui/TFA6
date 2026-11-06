<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            ['username' => 'earl.velasquez', 'full_name' => 'Earl Christian R. Velasquez', 'role' => 'Administrator'],
            ['username' => 'mika.santos', 'full_name' => 'Mika Santos', 'role' => 'Manager'],
            ['username' => 'leo.cruz', 'full_name' => 'Leo Cruz', 'role' => 'Cashier'],
            ['username' => 'nina.reyes', 'full_name' => 'Nina Reyes', 'role' => 'Cashier'],
            ['username' => 'paolo.lim', 'full_name' => 'Paolo Lim', 'role' => 'Inventory Staff'],
        ];

        foreach ($records as $record) {
            // Eloquent fills timestamps and preserves created_at on existing rows.
            User::updateOrCreate(['username' => $record['username']], $record);
        }
    }
}
