<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        User::create([
            'name' => 'Test admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        Category::create([
            'id' => 1,
            'name' => 'Electronik'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Electronik'
        ]);

        Products::create([
            'name' => 'laptop',
            'price' => 1500,
            'stok' => 10,
            'category_id' => 1,
            'image' => NULL,
            'description' => 'Kualitasnya sangat bagus, tidak akan pernah lag, lancar selalu enak buat di pake kerja'
        ]);

           Products::create([
            'name' => 'Buku novel',
            'price' => 1500,
            'stok' => 10,
            'category_id' => 2,
            'image' => NULL,
            'description' => 'manis'
        ]);
    }
}
