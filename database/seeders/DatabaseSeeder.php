<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Merchandise;
use App\Models\Purchase;
use App\Models\Purchased_Item;
use App\Models\Sale;
use App\Models\Sold_Item;
use Database\Seeders\PurchasedItemSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(MerchandiseSeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(PurchasedItemSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(SoldItemSeeder::class);
    }
}
