<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

         $this->call([
            SalesTypeSeeder::class,
            CurrencySeeder::class,
            ClassTypesSeeder::class,
            ChartClassSeeder::class, 
            ChartTypesSeeder::class,
            ChartMasterSeeder::class, 
            AccountTypeSeeder::class,
            PaymentTypeSeeder::class,
            CrmCategoriesSeeder::class,
            UserManagementSeeder::class,
            SecurityRolesSeeder::class,
        ]);
    }
}
