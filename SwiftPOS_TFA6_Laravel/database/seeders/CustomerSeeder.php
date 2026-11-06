<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            ['full_name' => 'Ana Reyes', 'email' => 'ana.reyes@example.com', 'phone' => '0917 555 0101'],
            ['full_name' => 'Miguel Santos', 'email' => 'miguel.santos@example.com', 'phone' => '0917 555 0102'],
            ['full_name' => 'Sofia Cruz', 'email' => 'sofia.cruz@example.com', 'phone' => '0917 555 0103'],
            ['full_name' => 'Gabriel Lim', 'email' => 'gabriel.lim@example.com', 'phone' => '0917 555 0104'],
            ['full_name' => 'Isabella Garcia', 'email' => 'isabella.garcia@example.com', 'phone' => '0917 555 0105'],
        ];

        foreach ($records as $record) {
            // Eloquent fills timestamps and preserves created_at on existing rows.
            Customer::updateOrCreate(['email' => $record['email']], $record);
        }
    }
}
