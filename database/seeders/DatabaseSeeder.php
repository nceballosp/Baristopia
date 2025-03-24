<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Recipe;
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
        User::factory(5)->create();
        Order::factory(5)->create();
        Product::factory(5)->create();
        Payment::factory(5)->create();
        Recipe::factory(5)->create();
        Item::factory(5)->create();
    }
}
