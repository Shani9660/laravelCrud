<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'short_name' => 'ELEC', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobiles', 'short_name' => 'MOB', 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laptops', 'short_name' => 'LAP', 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home Appliances', 'short_name' => 'HOME', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kitchen', 'short_name' => 'KIT', 'parent_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Furniture', 'short_name' => 'FURN', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Office Furniture', 'short_name' => 'OFF', 'parent_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gaming', 'short_name' => 'GAME', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Consoles', 'short_name' => 'CON', 'parent_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accessories', 'short_name' => 'ACC', 'parent_id' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
