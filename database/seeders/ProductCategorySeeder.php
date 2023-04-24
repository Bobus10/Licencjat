<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Akcesoria'],
            ['name' => 'Smartfony'],
            ['name' => 'Smartwatche'],
            ['name' => 'Ochrona telefonu'],
            ['name' => 'Laptopy'],
            ['name' => 'Komputery'],
            ['name' => 'Urządzenia peryferyjne'],
            ['name' => 'Monitory'],
        ];
        ProductCategory::insert($data);
    }
}
