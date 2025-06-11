<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductPrice;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Royal Canin Kitten',
                'description' => 'Complete feed for kittens (up to 12 months old)',
                'unit' => 'kg',
                'purchase_price' => 25000,
                'selling_price' => 30000,
            ],
            [
                'name' => 'Whiskas Adult Cat Food',
                'description' => 'Complete and balanced nutrition for adult cats',
                'unit' => 'kg',
                'purchase_price' => 18000,
                'selling_price' => 22000,
            ],
            [
                'name' => 'Pedigree Adult Dog Food',
                'description' => 'Complete and balanced nutrition for adult dogs',
                'unit' => 'kg',
                'purchase_price' => 20000,
                'selling_price' => 25000,
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'unit' => $productData['unit'],
            ]);

            ProductPrice::create([
                'product_id' => $product->id,
                'purchase_price' => $productData['purchase_price'],
                'selling_price' => $productData['selling_price'],
                'date' => now(),
            ]);
        }
    }
}
