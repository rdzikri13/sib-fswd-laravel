<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'T-Shirt',
            'code' => 'A0SP'
        ]);

        Category::create([
            'name' => 'Jacket',
            'code' => 'J01S'
        ]);
    }
}