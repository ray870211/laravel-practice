<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('products')->insert([
            'name' => "tea01",
            'price' => 30,
            'image_url' => 'localhost:8000/storage/products/tea.jpg'
        ]);

        DB::table('products')->insert([
            'name' => "tea02",
            'price' => 40,
            'image_url' => 'localhost:8000/storage/products/tea02.jpg'
        ]);
    }
}
