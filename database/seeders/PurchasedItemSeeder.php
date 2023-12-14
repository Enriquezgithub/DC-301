<?php

namespace Database\Seeders;

use App\Models\Purchased_Item;
use Database\Factories\PurchasedItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchasedItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Purchased_Item::factory(10)->create();
    }
}
