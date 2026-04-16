<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Categories::create([
            'id' => 1,
            'name' => 'Electronik'
        ]);

          Categories::create([
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
